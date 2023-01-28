<?php

namespace App\Http\Controllers;

use App\Models\FutureWorkImages;
use App\Models\FutureWorks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FutureWorksController extends Controller
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

        $futureWorksQuery = FutureWorks::select('futureWorks.*')
            ->orderBy('futureWorks.id', 'desc');

        $allFutureWorks = $futureWorksQuery->count();

        if ($request->page) {
            $futureWorksQuery->offset(($request->page - 1) * 10);
        }

        $futureWorks = $futureWorksQuery->limit(10)
            ->get();

        $pagination = [
            'offsets' => ceil($allFutureWorks / 10),
            'offset' => $request->page ? $request->page : 1,
            'all' => $allFutureWorks
        ];

        return view('futureWorks', compact('futureWorks', 'pagination'));
    }

    public function insert(Request $request)
    {
        $futureWork = new FutureWorks;
        $futureWork->name = $request->name;
        $futureWork->en_name = $request->en_name;
        $futureWork->cn_name = $request->cn_name;
        $futureWork->th_name = $request->th_name;
        $futureWork->description = $request->description;

        if ($futureWork->save()) {
            return redirect('futureWorks')->with(['error' => 'insert_success']);
        } else {
            return redirect('futureWorks')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $futureWork = FutureWorks::where('id', $id)->first();

        return view('editFutureWork', compact('futureWork'));
    }

    public function update(Request $request)
    {
        $futureWork = [
            'name' => $request->name,
            'en_name' => $request->en_name,
            'cn_name' => $request->cn_name,
            'th_name' => $request->th_name,
            'description' => htmlentities($request->description),
        ];

        if (FutureWorks::where('id', $request->id)->update($futureWork)) {
            return redirect('futureWorks')->with(['error' => 'edit_success']);
        } else {
            return redirect('futureWorks')->with(['error' => 'not_insert']);
        }
    }

    public function thumbnail($id)
    {
        $futureWork = FutureWorks::where('id', $id)->first();
        return view('futureWorkThumbnail', compact('futureWork'));
    }

    public function updateThumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design';
            $image->move($dest, $reImage);

            $futureWork = [
                'thumbnail' => $reImage,
            ];

            if (FutureWorks::where('id', $request->id)->update($futureWork)) {
                return redirect('futureWorkThumbnail/' . $request->id)->with(['error' => 'edit_success']);
            } else {
                return redirect('futureWorkThumbnail/' . $request->id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('futureWorkThumbnail/' . $request->id)->with(['error' => 'not_insert']);
        }
    }

    public function futureWorkImages($id)
    {
        $futureWorkImages = FutureWorkImages::select('futureWorkImages.*')
            ->join('futureWorks', 'futureWorkImages.futurework_id', 'futureWorks.id')
            ->where('futureWorks.id', $id)
            ->orderBy('futureWorkImages.id', 'desc')
            ->get();
        return view('futureWorkImages', compact('futureWorkImages', 'id'));
    }

    public function addFutureWorkImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design/slide';
            $image->move($dest, $reImage);

            $futureWorkImage = new FutureWorkImages;
            $futureWorkImage->img_src = $reImage;
            $futureWorkImage->futurework_id = $request->futurework_id;

            if ($futureWorkImage->save()) {
                return redirect('futureWorkImages/' . $request->futurework_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('futureWorkImages/' . $request->futurework_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('futureWorkImages/' . $request->futurework_id)->with(['error' => 'not_insert']);
        }
    }

    public function deleteFutureWorkImage($id, $futurework_id)
    {
        $futureWorkImage = FutureWorkImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $futureWorkImage->img_src;
        unlink($file_path);
        if (FutureWorkImages::where('id', $id)->delete()) {
            return redirect('futureWorkImages/' . $futurework_id)->with(['error' => 'delete_success']);
        } else {
            return redirect('futureWorkImages/' . $futurework_id)->with(['error' => 'not_insert']);
        }
    }

    public function delete($id)
    {
        $branch = [
            'enabled' => '0'
        ];

        if (FutureWorks::where('id', $id)->update($branch)) {
            return redirect('branchs')->with(['error' => 'delete_success']);
        } else {
            return redirect('branchs')->with(['error' => 'not_insert']);
        }
    }
}