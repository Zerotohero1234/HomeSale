<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Plans;
use App\Models\PlanSlideImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class PlanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if (Auth::user()->is_admin != 1) {
            return redirect('access_denied');
        }

        $pagination = [
            'offsets' => ceil(sizeof(Plans::select('plans.*')
                ->join('categories', 'plans.category', 'categories.id')
                ->get()) / 10),
            'offset' => 1,
            'all' => sizeof(Plans::select('plans.*')
                ->join('categories', 'plans.category', 'categories.id')
                ->get())
        ];
        $plans = Plans::select('plans.*', 'categories.cate_name')
            ->join('categories', 'plans.category', 'categories.id')
            ->orderBy('plans.id', 'asc')
            ->limit(10)
            ->get();

        $all_plans = Plans::select('plans.*', 'categories.cate_name')
            ->join('categories', 'plans.category', 'categories.id')
            ->orderBy('plans.id', 'asc')
            ->get();

        $categories = Categories::all();

        return view('plans', compact('plans', 'categories', 'all_plans', 'pagination'));
    }

    public function pagination($offset)
    {
        $provinces = Provinces::all();
        $districts = Districts::all();
        $pagination = [
            'offsets' => ceil(sizeof(Plans::select('branchs.*')
                ->join('districts', 'branchs.district_id', 'districts.id')
                ->join('provinces', 'districts.prov_id', 'provinces.id')
                ->where('branchs.enabled', '1')
                ->get()) / 10),
            'offset' => $offset,
            'all' => sizeof(Plans::select('branchs.*')
                ->join('districts', 'branchs.district_id', 'districts.id')
                ->join('provinces', 'districts.prov_id', 'provinces.id')
                ->where('branchs.enabled', '1')
                ->get())
        ];
        $branchs = Plans::select('branchs.*')
            ->join('districts', 'branchs.district_id', 'districts.id')
            ->join('provinces', 'districts.prov_id', 'provinces.id')
            ->where('branchs.enabled', '1')
            ->orderBy('branchs.id', 'desc')
            ->offset(($offset - 1) * 10)
            ->limit(10)
            ->get();
        return view('branch', compact('provinces', 'districts', 'branchs', 'pagination'));
    }

    public function insert(Request $request)
    {
        $plan = new Plans;
        $plan->plan_name = $request->plan_name;
        $plan->category = $request->category;
        $plan->width = $request->width;
        $plan->depth = $request->depth;
        $plan->leaving_area = $request->leaving_area;
        $plan->bedroom = $request->bedroom;
        $plan->bath = $request->bath;
        $plan->floor = $request->floor;

        if ($plan->save()) {
            return redirect('plans')->with(['error' => 'insert_success']);
        } else {
            return redirect('plans')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $plan = Plans::where('id', $id)->first();
        $categories = Categories::all();

        return view('editPlan', compact('plan', 'categories'));
    }

    public function update(Request $request)
    {
        $plan = [
            'plan_name' => $request->plan_name,
            'category' => $request->category,
            'width' => $request->width,
            'depth' => $request->depth,
            'leaving_area' => $request->leaving_area,
            'bedroom' => $request->bedroom,
            'bath' => $request->bath,
            'floor' => $request->floor,
        ];

        if (Plans::where('id', $request->id)->update($plan)) {
            return redirect('plans')->with(['error' => 'edit_success']);
        } else {
            return redirect('plans')->with(['error' => 'not_insert']);
        }
    }

    public function thumbnail($id)
    {
        $plan = Plans::where('id', $id)->first();
        return view('planThumbnail', compact('plan'));
    }

    public function updateThumbnail(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/img/design');
            $image->move($dest, $reImage);

            $plan = [
                'thumbnail' => $reImage,
            ];

            if (Plans::where('id', $request->id)->update($plan)) {
                return redirect('planThumbnail/' . $request->id)->with(['error' => 'edit_success']);
            } else {
                return redirect('planThumbnail/' . $request->id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('planThumbnail/' . $request->id)->with(['error' => 'not_insert']);
        }
    }

    public function addSlideImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/img/design/slide');
            $image->move($dest, $reImage);

            $planSlideImage = new PlanSlideImages;
            $planSlideImage->img_src = $reImage;
            $planSlideImage->plan_id = $request->plan_id;

            if ($planSlideImage->save()) {
                return redirect('planSlideImages/' . $request->plan_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('planSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('planSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function slideImages($id)
    {
        $planSlideImages = PlanSlideImages::select('planSlideImages.*')
            ->join('plans', 'planSlideImages.plan_id', 'plans.id')
            ->where('plans.id', $id)->get();
        return view('planSlideImages', compact('planSlideImages', 'id'));
    }

    public function deleteSlideImage($id, $plan_id)
    {
        $planSlideImage = PlanSlideImages::where('id', $id)->first();
        $file_path = public_path() . '/img/design/slide/' . $planSlideImage->img_src;
        unlink($file_path);
        if (PlanSlideImages::where('id', $id)->delete()) {
            return redirect('planSlideImages/' . $plan_id)->with(['error' => 'delete_success']);
        } else {
            return redirect('planSlideImages/' . $plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function delete($id)
    {
        $branch = [
            'enabled' => '0'
        ];

        if (Plans::where('id', $id)->update($branch)) {
            return redirect('branchs')->with(['error' => 'delete_success']);
        } else {
            return redirect('branchs')->with(['error' => 'not_insert']);
        }
    }
}