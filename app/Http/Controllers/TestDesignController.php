<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Plans;
use App\Models\Floors;
use App\Models\PlanSlideImages;
use App\Models\Recommendeds;
use App\Models\Rooms;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;

class TestDesignController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $categories = Categories::all();
        $recommendeds = Plans::join('categories', 'plans.category', 'categories.id')
            ->join('recommendeds', 'plans.id', 'recommendeds.plan_id')->get();

        $categories_results = array();
        foreach ($categories as $key_main => $category_main) {
            if ($category_main["cate_level"] === "main") {
                $array_subs = array();
                foreach ($categories as $key_sub => $category_sub) {
                    if ($category_sub["cate_level"] == "sub") {
                        if ($category_sub["parent"] == $category_main["id"]) {
                            $array_childs = array();
                            foreach ($categories as $key_child => $category_child) {
                                if ($category_child["cate_level"] == "child") {
                                    if ($category_child["parent"] == $category_sub["id"]) {
                                        array_push($array_childs, $category_child);
                                    }
                                }
                            }
                            $array_sub = $category_sub;
                            $array_sub["child"] = $array_childs;
                            array_push($array_subs, $array_sub);
                        }
                    }
                }
                $array_main = $category_main;
                $array_main["child"] = $array_subs;
                array_push($categories_results, $array_main);
            }
        }


        return view('testdesign.home', compact('categories_results', 'recommendeds'));
    }

    public function detail($id)
    {
        $plan = Plans::where('id', $id)->first();
        $rooms = Rooms::select('floors.floor_name', 'rooms.*')
            ->join('floors', 'rooms.floor_id', 'floors.id')
            ->join('plans', 'floors.plan_id', 'plans.id')
            ->where('plans.id', $id)
            ->get();

        $floors = Floors::select('floors.*')
            ->join('plans', 'floors.plan_id', 'plans.id')
            ->where('plans.id', $id)
            ->get();

        $floor_with_rooms = array();

        foreach ($floors as $key => $floor) {
            $array_rooms = array();
            foreach ($rooms as $key => $room) {
                if ($room->floor_id == $floor->id) {
                    array_push($array_rooms, $room);
                }
            }
            $array_floor = $floor;
            $array_floor["rooms"] = $array_rooms;
            array_push($floor_with_rooms, $array_floor);
        }

        $recommendeds = Plans::join('categories', 'plans.category', 'categories.id')
            ->join('recommendeds', 'plans.id', 'recommendeds.plan_id')->get();

        $planSlideImages = PlanSlideImages::join('plans', 'planSlideImages.plan_id', 'plans.id')
            ->where('plans.id', $id)
            ->get();

        return view('testdesign.detail', compact('plan', 'floor_with_rooms', 'recommendeds', 'planSlideImages'));
    }

    public function access_denied()
    {
        return view('accessDenied');
    }
}