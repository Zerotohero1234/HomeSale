<?php

namespace App\Http\Controllers;

use App\Models\PresentWorkImages;
use App\Models\PresentWorks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresentWorksController extends Controller
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

        $presentWorksQuery = PresentWorks::select('presentWorks.*')
            ->orderBy('presentWorks.id', 'desc');

        $allPresentWorks = $presentWorksQuery->count();

        if ($request->page) {
            $presentWorksQuery->offset(($request->page - 1) * 10);
        }

        $presentWorks = $presentWorksQuery->limit(10)
            ->get();

        $pagination = [
            'offsets' => ceil($allPresentWorks / 10),
            'offset' => $request->page ? $request->page : 1,
            'all' => $allPresentWorks
        ];

        return view('presentWorks', compact('presentWorks', 'pagination'));
    }

    public function insert(Request $request)
    {
        $presentWork = new PresentWorks;
        $presentWork->name = $request->name;
        $presentWork->en_name = $request->en_name;
        $presentWork->cn_name = $request->cn_name;
        $presentWork->th_name = $request->th_name;
        $presentWork->description = $request->description;

        if ($presentWork->save()) {
            return redirect('presentWorks')->with(['error' => 'insert_success']);
        } else {
            return redirect('presentWorks')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $presentWork = PresentWorks::where('id', $id)->first();

        return view('editPresentWork', compact('presentWork'));
    }

    public function update(Request $request)
    {
        $presentWork = [
            'name' => $request->name,
            'en_name' => $request->en_name,
            'cn_name' => $request->cn_name,
            'th_name' => $request->th_name,
            'description' => htmlentities($request->description),
        ];

        if (PresentWorks::where('id', $request->id)->update($presentWork)) {
            return redirect('presentWorks')->with(['error' => 'edit_success']);
        } else {
            return redirect('presentWorks')->with(['error' => 'not_insert']);
        }
    }

    public function thumbnail($id)
    {
        $presentWork = PresentWorks::where('id', $id)->first();
        return view('presentWorkThumbnail', compact('presentWork'));
    }

    public function updateThumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design';
            $image->move($dest, $reImage);

            $presentWork = [
                'thumbnail' => $reImage,
            ];

            if (PresentWorks::where('id', $request->id)->update($presentWork)) {
                return redirect('presentWorkThumbnail/' . $request->id)->with(['error' => 'edit_success']);
            } else {
                return redirect('presentWorkThumbnail/' . $request->id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('presentWorkThumbnail/' . $request->id)->with(['error' => 'not_insert']);
        }
    }

    public function presentWorkImages($id)
    {
        $presentWorkImages = PresentWorkImages::select('presentWorkImages.*')
            ->join('presentWorks', 'presentWorkImages.presentwork_id', 'presentWorks.id')
            ->where('presentWorks.id', $id)
            ->orderBy('presentWorkImages.id', 'desc')
            ->get();
        return view('presentWorkImages', compact('presentWorkImages', 'id'));
    }

    public function addPresentWorkImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design/slide';
            $image->move($dest, $reImage);

            $presentWorkImage = new PresentWorkImages;
            $presentWorkImage->img_src = $reImage;
            $presentWorkImage->presentwork_id = $request->presentwork_id;

            if ($presentWorkImage->save()) {
                return redirect('presentWorkImages/' . $request->presentwork_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('presentWorkImages/' . $request->presentwork_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('presentWorkImages/' . $request->presentwork_id)->with(['error' => 'not_insert']);
        }
    }

    public function deletePresentWorkImage($id, $presentwork_id)
    {
        $presentWorkImage = PresentWorkImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $presentWorkImage->img_src;
        unlink($file_path);
        if (PresentWorkImages::where('id', $id)->delete()) {
            return redirect('presentWorkImages/' . $presentwork_id)->with(['error' => 'delete_success']);
        } else {
            return redirect('presentWorkImages/' . $presentwork_id)->with(['error' => 'not_insert']);
        }
    }

    public function delete($id)
    {
        $branch = [
            'enabled' => '0'
        ];

        if (PresentWorks::where('id', $id)->update($branch)) {
            return redirect('branchs')->with(['error' => 'delete_success']);
        } else {
            return redirect('branchs')->with(['error' => 'not_insert']);
        }
    }
}