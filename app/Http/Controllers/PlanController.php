<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\FloorPlanSlideImages;
use App\Models\Floors;
use App\Models\Plans;
use App\Models\PlanSlideImages;
use App\Models\Rooms;
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
            ->limit(10)
            ->orderBy('plans.id', 'desc')
            ->get();

        $categories = Categories::all();

        return view('plans', compact('plans', 'categories', 'pagination'));
    }

    // public function pagination($offset)
    // {
    //     $provinces = Provinces::all();
    //     $districts = Districts::all();
    //     $pagination = [
    //         'offsets' => ceil(sizeof(Plans::select('branchs.*')
    //             ->join('districts', 'branchs.district_id', 'districts.id')
    //             ->join('provinces', 'districts.prov_id', 'provinces.id')
    //             ->where('branchs.enabled', '1')
    //             ->get()) / 10),
    //         'offset' => $offset,
    //         'all' => sizeof(Plans::select('branchs.*')
    //             ->join('districts', 'branchs.district_id', 'districts.id')
    //             ->join('provinces', 'districts.prov_id', 'provinces.id')
    //             ->where('branchs.enabled', '1')
    //             ->get())
    //     ];
    //     $branchs = Plans::select('branchs.*')
    //         ->join('districts', 'branchs.district_id', 'districts.id')
    //         ->join('provinces', 'districts.prov_id', 'provinces.id')
    //         ->where('branchs.enabled', '1')
    //         ->orderBy('branchs.id', 'desc')
    //         ->offset(($offset - 1) * 10)
    //         ->limit(10)
    //         ->get();
    //     return view('branch', compact('provinces', 'districts', 'branchs', 'pagination'));
    // }

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
        $plan->description = htmlentities($request->description);

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
            'description' => htmlentities($request->description),
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
            $dest = './img/design';
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
            $dest = './img/design/slide';
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
            ->where('plans.id', $id)
            ->orderBy('planSlideImages.id', 'desc')
            ->get();
        return view('planSlideImages', compact('planSlideImages', 'id'));
    }

    public function deleteSlideImage($id, $plan_id)
    {
        $planSlideImage = PlanSlideImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $planSlideImage->img_src;
        unlink($file_path);
        if (PlanSlideImages::where('id', $id)->delete()) {
            return redirect('planSlideImages/' . $plan_id)->with(['error' => 'delete_success']);
        } else {
            return redirect('planSlideImages/' . $plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function addFloorPlanSlideImage(Request $request)
    {
        if ($request->hasFile('img_src')) {
            $image = $request->file('img_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = './img/design/slide';
            $image->move($dest, $reImage);

            $floorPlanSlideImage = new FloorPlanSlideImages;
            $floorPlanSlideImage->img_src = $reImage;
            $floorPlanSlideImage->plan_id = $request->plan_id;

            if ($floorPlanSlideImage->save()) {
                return redirect('floorPlanSlideImages/' . $request->plan_id)->with(['error' => 'insert_success']);
            } else {
                return redirect('floorPlanSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
            }
        } else {
            return redirect('floorPlanSlideImages/' . $request->plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function floorPlanSlideImages($id)
    {
        $floorPlanSlideImages = FloorPlanSlideImages::select('floorPlanSlideImages.*')
            ->join('plans', 'floorPlanSlideImages.plan_id', 'plans.id')
            ->where('plans.id', $id)
            ->orderBy('floorPlanSlideImages.id', 'desc')
            ->get();
        return view('floorPlanSlideImages', compact('floorPlanSlideImages', 'id'));
    }

    public function deleteFloorPlanSlideImage($id, $plan_id)
    {
        $floorPlanSlideImage = FloorPlanSlideImages::where('id', $id)->first();
        $file_path = './img/design/slide/' . $floorPlanSlideImage->img_src;
        unlink($file_path);
        if (FloorPlanSlideImages::where('id', $id)->delete()) {
            return redirect('floorPlanSlideImages/' . $plan_id)->with(['error' => 'delete_success']);
        } else {
            return redirect('floorPlanSlideImages/' . $plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function floors($id)
    {
        $floors = Floors::select('floors.*')
            ->join('plans', 'floors.plan_id', 'plans.id')
            ->where('plans.id', $id)
            ->orderBy('floors.id', 'desc')
            ->get();
        return view('floors', compact('floors', 'id'));
    }

    public function addFloor(Request $request)
    {
        $floor = new Floors;
        $floor->floor_name = $request->floor_name;
        $floor->plan_id = $request->plan_id;

        if ($floor->save()) {
            return redirect('floors/' . $request->plan_id)->with(['error' => 'insert_success']);
        } else {
            return redirect('floors/' . $request->plan_id)->with(['error' => 'not_insert']);
        }
    }

    public function editFloor($id)
    {
        $floor = Floors::where('id', $id)->first();

        return view('editFloor', compact('floor'));
    }

    public function updateFloor(Request $request)
    {
        $floor = [
            'floor_name' => $request->floor_name,
        ];

        if (Floors::where('id', $request->id)->update($floor)) {
            return redirect('floors/' . $request->id)->with(['error' => 'edit_success']);
        } else {
            return redirect('floors/' . $request->id)->with(['error' => 'not_insert']);
        }
    }

    public function rooms($id)
    {
        $rooms = Rooms::select('rooms.*')
            ->join('floors', 'rooms.floor_id', 'floors.id')
            ->where('floors.id', $id)
            ->orderBy('rooms.id', 'desc')
            ->get();
        return view('rooms', compact('rooms', 'id'));
    }

    public function addRoom(Request $request)
    {
        $room = new rooms;
        $room->room_name = $request->room_name;
        $room->size = $request->size;
        $room->ceiling = $request->ceiling;
        $room->floor_id = $request->floor_id;

        if ($room->save()) {
            return redirect('rooms/' . $request->floor_id)->with(['error' => 'insert_success']);
        } else {
            return redirect('rooms/' . $request->floor_id)->with(['error' => 'not_insert']);
        }
    }

    public function editRoom($id)
    {
        $room = Rooms::where('id', $id)->first();

        return view('editRoom', compact('room'));
    }

    public function updateRoom(Request $request)
    {
        $room = [
            'room_name' => $request->room_name,
            'size' => $request->size,
            'ceiling' => $request->ceiling,
        ];

        if (Rooms::where('id', $request->id)->update($room)) {
            return redirect('rooms/' . $request->id)->with(['error' => 'edit_success']);
        } else {
            return redirect('rooms/' . $request->id)->with(['error' => 'not_insert']);
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