<?php

namespace App\Http\Controllers;

use App\Models\LampCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LampCategoryController extends Controller
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

        $lampCategoriesQuery = LampCategories::select('lamp_categories.*')
            ->orderBy('lamp_categories.id', 'desc');

        $all_lamp_categories = $lampCategoriesQuery->count();

        if ($request->page) {
            $lampCategoriesQuery->offset(($request->page - 1) * 10);
        }

        $lamp_categories = $lampCategoriesQuery->limit(10)
            ->get();

        $pagination = [
            'offsets' => ceil($all_lamp_categories / 10),
            'offset' => $request->page ? $request->page : 1,
            'all' => $all_lamp_categories
        ];

        return view('lampCategories', compact('lamp_categories', 'pagination'));
    }

    public function insert(Request $request)
    {
        $lamp_category = new LampCategories;
        $lamp_category->name = $request->name;
        $lamp_category->en_name = $request->en_name;
        $lamp_category->cn_name = $request->cn_name;
        $lamp_category->th_name = $request->th_name;
        if ($lamp_category->save()) {
            return redirect('lampCategories')->with(['error' => 'insert_success']);
        } else {
            return redirect('lampCategories')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $lamp_category = LampCategories::where('id', $id)->first();
        $all_lamp_categories = LampCategories::select('lamp_categories.*')
            ->orderBy('lamp_categories.id', 'asc')
            ->get();

        return view('editLampCategory', compact('lamp_category', 'all_lamp_categories'));
    }

    public function update(Request $request)
    {
        $lamp_category = [
            'name' => $request->name,
            'en_name' => $request->en_name,
            'cn_name' => $request->cn_name,
            'th_name' => $request->th_name,
        ];

        if (LampCategories::where('id', $request->id)->update($lamp_category)) {
            return redirect('lampCategories')->with(['error' => 'edit_success']);
        } else {
            return redirect('lampCategories')->with(['error' => 'not_insert']);
        }
    }
}