<?php

namespace App\Http\Controllers;

use App\Models\LampCategories;
use App\Models\Lamps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LampController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if (Auth::user()->is_admin != 1) {
            return redirect('access_denied');
        }

        $lampsQuery = Lamps::select('lamps.*', 'lamp_categories.name as cate_name')
            ->join('lamp_categories', 'lamps.category_id', 'lamp_categories.id')
            ->orderBy('lamps.id', 'desc');

        if ($request->name != '') {
            $lampsQuery->where('name', $request->name);
        }
        if ($request->category != '') {
            $lampsQuery->where('category', $request->category);
        }

        $all_lamps = $lampsQuery->count();

        if ($request->page) {
            $lampsQuery->offset(($request->page - 1) * 10);
        }

        $lamps = $lampsQuery->limit(10)
            ->get();

        $pagination = [
            'offsets' => ceil($all_lamps / 10),
            'offset' => $request->page ? $request->page : 1,
            'all' => $all_lamps
        ];

        $categories = LampCategories::all();

        return view('lamps', compact('lamps', 'categories', 'pagination'));
    }

    public function insert(Request $request)
    {
        $lamp = new Lamps;
        $lamp->name = $request->name;
        $lamp->en_name = $request->en_name;
        $lamp->cn_name = $request->cn_name;
        $lamp->th_name = $request->th_name;
        $lamp->price = $request->price;
        $lamp->category_id = $request->category_id;
        $lamp->desc = htmlentities($request->desc);

        if ($lamp->save()) {
            return redirect('manageLamps')->with(['error' => 'insert_success']);
        } else {
            return redirect('manageLamps')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $lamp = Lamps::where('id', $id)->first();
        $categories = LampCategories::all();

        return view('editLamp', compact('lamp', 'categories'));
    }

    public function update(Request $request)
    {
        $lamp = [
            'name' => $request->name,
            'en_name' => $request->en_name,
            'cn_name' => $request->cn_name,
            'th_name' => $request->th_name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'desc' => htmlentities($request->desc),
        ];

        if (Lamps::where('id', $request->id)->update($lamp)) {
            return redirect('manageLamps')->with(['error' => 'edit_success']);
        } else {
            return redirect('manageLamps')->with(['error' => 'not_insert']);
        }
    }

    public function thumbnail($id)
    {
        $lamp = Lamps::where('id', $id)->first();
        return view('lampThumbnail', compact('lamp'));
    }

    public function updateThumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design';
            $image->move($dest, $reImage);

            $lamp = [
                'thumbnail' => $reImage,
            ];

            if (Lamps::where('id', $request->id)->update($lamp)) {
                return redirect('lampThumbnail/' . $request->id)->with(['error' => 'edit_success']);
            } else {
                return redirect('lampThumbnail/' . $request->id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('lampThumbnail/' . $request->id)->with(['error' => 'not_insert']);
        }
    }
}