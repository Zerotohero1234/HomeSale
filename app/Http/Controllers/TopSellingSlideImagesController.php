<?php

namespace App\Http\Controllers;

use App\Models\TopSellingSlideImages;
use Illuminate\Http\Request;

class TopSellingSlideImagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addTopSellingSlideImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design/slide';
            $image->move($dest, $reImage);

            $topSellingSlideImage = new TopSellingSlideImages;
            $topSellingSlideImage->img_src = $reImage;
            $topSellingSlideImage->link = $request->link;

            if ($topSellingSlideImage->save()) {
                return redirect('topSellingSlideImages/' . $request->plan_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('topSellingSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('topSellingSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function topSellingSlideImages(Request $request)
    {
        $topSellingSlideImages = TopSellingSlideImages::select('topSellingSlideImages.*')
            ->orderBy('topSellingSlideImages.id', 'desc')
            ->get();
        return view('topSellingSlideImages', compact('topSellingSlideImages'));
    }

    public function deleteTopSellingSlideImage($id)
    {
        $topSellingSlideImage = TopSellingSlideImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $topSellingSlideImage->img_src;
        unlink($file_path);
        if (topSellingSlideImages::where('id', $id)->delete()) {
            return redirect('topSellingSlideImages')->with(['error' => 'delete_success']);
        } else {
            return redirect('topSellingSlideImages')->with(['error' => 'not_insert']);
        }
    }

}