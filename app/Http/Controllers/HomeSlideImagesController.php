<?php

namespace App\Http\Controllers;

use App\Models\HomeSlideImages;
use Illuminate\Http\Request;

class HomeSlideImagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addHomeSlideImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design/slide';
            $image->move($dest, $reImage);

            $homeSlideImage = new HomeSlideImages;
            $homeSlideImage->img_src = $reImage;
            $homeSlideImage->link = $request->link;

            if ($homeSlideImage->save()) {
                return redirect('homeSlideImages/' . $request->plan_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('homeSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('homeSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function homeSlideImages(Request $request)
    {
        $homeSlideImages = HomeSlideImages::select('homeSlideImages.*')
            ->orderBy('homeSlideImages.id', 'desc')
            ->get();
        return view('homeSlideImages', compact('homeSlideImages'));
    }

    public function deleteHomeSlideImage($id)
    {
        $homeSlideImage = HomeSlideImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $homeSlideImage->img_src;
        unlink($file_path);
        if (HomeSlideImages::where('id', $id)->delete()) {
            return redirect('homeSlideImages')->with(['error' => 'delete_success']);
        } else {
            return redirect('homeSlideImages')->with(['error' => 'not_insert']);
        }
    }

}