<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\FloorPlanSlideImages;
use App\Models\Floors;
use App\Models\PastWorkImages;
use App\Models\PastWorks;
use App\Models\Plans;
use App\Models\PlanSlideImages;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PastWorksController extends Controller
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

        $pastWorksQuery = PastWorks::select('pastWorks.*')
            ->orderBy('pastWorks.id', 'desc');

        $allPastWorks = $pastWorksQuery->count();

        if ($request->page) {
            $pastWorksQuery->offset(($request->page - 1) * 10);
        }

        $pastWorks = $pastWorksQuery->limit(10)
            ->get();

        $pagination = [
            'offsets' => ceil($allPastWorks / 10),
            'offset' => $request->page ? $request->page : 1,
            'all' => $allPastWorks
        ];

        return view('pastWorks', compact('pastWorks', 'pagination'));
    }

    public function insert(Request $request)
    {
        $pastWork = new PastWorks;
        $pastWork->name = $request->name;
        $pastWork->en_name = $request->en_name;
        $pastWork->cn_name = $request->cn_name;
        $pastWork->th_name = $request->th_name;
        $pastWork->description = $request->description;

        if ($pastWork->save()) {
            return redirect('pastWorks')->with(['error' => 'insert_success']);
        } else {
            return redirect('pastWorks')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $pastWork = PastWorks::where('id', $id)->first();

        return view('editPastWork', compact('pastWork'));
    }

    public function update(Request $request)
    {
        $pastWork = [
            'name' => $request->name,
            'en_name' => $request->en_name,
            'cn_name' => $request->cn_name,
            'th_name' => $request->th_name,
            'description' => htmlentities($request->description),
        ];

        if (PastWorks::where('id', $request->id)->update($pastWork)) {
            return redirect('pastWorks')->with(['error' => 'edit_success']);
        } else {
            return redirect('pastWorks')->with(['error' => 'not_insert']);
        }
    }

    public function thumbnail($id)
    {
        $pastWork = PastWorks::where('id', $id)->first();
        return view('pastWorkThumbnail', compact('pastWork'));
    }

    public function updateThumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design';
            $image->move($dest, $reImage);

            $pastWork = [
                'thumbnail' => $reImage,
            ];

            if (PastWorks::where('id', $request->id)->update($pastWork)) {
                return redirect('pastWorkThumbnail/' . $request->id)->with(['error' => 'edit_success']);
            } else {
                return redirect('pastWorkThumbnail/' . $request->id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('pastWorkThumbnail/' . $request->id)->with(['error' => 'not_insert']);
        }
    }

    public function pastWorkImages($id)
    {
        $pastWorkImages = PastWorkImages::select('pastWorkImages.*')
            ->join('pastWorks', 'pastWorkImages.pastwork_id', 'pastWorks.id')
            ->where('pastWorks.id', $id)
            ->orderBy('pastWorkImages.id', 'desc')
            ->get();
        return view('pastWorkImages', compact('pastWorkImages', 'id'));
    }

    public function addPastWorkImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design/slide';
            $image->move($dest, $reImage);

            $pastWorkImage = new PastWorkImages;
            $pastWorkImage->img_src = $reImage;
            $pastWorkImage->pastwork_id = $request->pastwork_id;

            if ($pastWorkImage->save()) {
                return redirect('pastWorkImages/' . $request->pastwork_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('pastWorkImages/' . $request->pastwork_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('pastWorkImages/' . $request->pastwork_id)->with(['error' => 'not_insert']);
        }
    }

    public function deletePastWorkImage($id, $pastwork_id)
    {
        $pastWorkImage = PastWorkImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $pastWorkImage->img_src;
        unlink($file_path);
        if (PastWorkImages::where('id', $id)->delete()) {
            return redirect('pastWorkImages/' . $pastwork_id)->with(['error' => 'delete_success']);
        } else {
            return redirect('pastWorkImages/' . $pastwork_id)->with(['error' => 'not_insert']);
        }
    }

    public function delete($id)
    {
        $branch = [
            'enabled' => '0'
        ];

        if (PastWorks::where('id', $id)->update($branch)) {
            return redirect('branchs')->with(['error' => 'delete_success']);
        } else {
            return redirect('branchs')->with(['error' => 'not_insert']);
        }
    }
}