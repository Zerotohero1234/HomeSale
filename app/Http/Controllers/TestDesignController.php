<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\FloorPlanSlideImages;
use App\Models\HomeSlideImages;
use App\Models\Plans;
use App\Models\Floors;
use App\Models\PlanSlideImages;
use App\Models\Rooms;
use App\Models\TopSellingSlideImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestDesignController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
    }

    public function index(Request $request)
    {
        $categories = Categories::all();
        $homeSlideImages = HomeSlideImages::all();
        $topSellingSlideImages = TopSellingSlideImages::all();
        $recommendeds = Plans::join('categories', 'plans.category', 'categories.id')
            ->join('recommendeds', 'plans.id', 'recommendeds.plan_id')->get();

        // $categories_results = array();
        // foreach ($categories as $key_main => $category_main) {
        //     if ($category_main["cate_level"] === "main") {
        //         $array_subs = array();
        //         foreach ($categories as $key_sub => $category_sub) {
        //             if ($category_sub["cate_level"] == "sub") {
        //                 if ($category_sub["parent"] == $category_main["id"]) {
        //                     $array_childs = array();
        //                     foreach ($categories as $key_child => $category_child) {
        //                         if ($category_child["cate_level"] == "child") {
        //                             if ($category_child["parent"] == $category_sub["id"]) {
        //                                 array_push($array_childs, $category_child);
        //                             }
        //                         }
        //                     }
        //                     $array_sub = $category_sub;
        //                     $array_sub["child"] = $array_childs;
        //                     array_push($array_subs, $array_sub);
        //                 }
        //             }
        //         }
        //         $array_main = $category_main;
        //         $array_main["child"] = $array_subs;
        //         array_push($categories_results, $array_main);
        //     }
        // }
        // echo App::getLocale();
        // exit;
        $category_plans = array();
        foreach ($categories as $category) {
            $category_plan = array();
            $category_plan['cate_name'] = App::getLocale() == 'la' ? $category->cate_name : (App::getLocale() == 'en' ? $category->cate_en_name : $category->cate_cn_name);

            $category_plan['id'] = $category->id;
            $category_plan['plans'] = Plans::select('plans.*')
                ->join('categories', 'plans.category', 'categories.id')
                ->where('category', $category->id)
                ->orderBy('plans.id', 'desc')
                ->limit(3)
                ->get();
            array_push($category_plans, $category_plan);
        }

        $planSlideImages = PlanSlideImages::join('plans', 'planSlideImages.plan_id', 'plans.id')
            ->get();

        return view('testdesign.home', compact('categories', 'recommendeds', 'planSlideImages', 'category_plans', 'homeSlideImages', 'topSellingSlideImages'));
    }

    public function search(Request $request)
    {
        $plansQuery = Plans::select('plans.*', 'categories.cate_name')
            ->join('categories', 'plans.category', 'categories.id')
            ->orderBy('plans.id', 'asc');

        if ($request->floor != '') {
            $plansQuery->where('floor', $request->floor);
        }

        if ($request->bedroom != '') {
            $plansQuery->where('bedroom', $request->bedroom);
        }

        if ($request->bath != '') {
            $plansQuery->where('bath', $request->bath);
        }

        $all_plans = $plansQuery->orderBy('plans.id', 'desc')
            ->count();

        if ($request->page) {
            $plansQuery->offset(($request->page - 1) * 24);
        }

        $plans = $plansQuery->limit(24)
            ->get();

        $pagination = [
            'offsets' => ceil($all_plans / 24),
            'offset' => $request->page ? $request->page : 1,
            'all' => $all_plans
        ];

        $categories = Categories::all();

        return view('testdesign.search', compact('plans', 'categories', 'pagination'));
    }

    public function plansByCategory($id, Request $request)
    {
        $plansQuery = Plans::select('plans.*', 'categories.cate_name')
            ->join('categories', 'plans.category', 'categories.id')
            ->where('categories.id', $id)
            ->orderBy('plans.id', 'asc');

        $all_plans = $plansQuery->orderBy('plans.id', 'desc')
            ->count();

        if ($request->page) {
            $plansQuery->offset(($request->page - 1) * 24);
        }

        $plans = $plansQuery->limit(24)
            ->get();

        $pagination = [
            'offsets' => ceil($all_plans / 24),
            'offset' => $request->page ? $request->page : 1,
            'all' => $all_plans
        ];

        $categories = Categories::all();

        $category_id = $id;

        $category = Categories::where('id', $id)->first();

        return view('testdesign.plansByCategory', compact('plans', 'category', 'categories', 'pagination', 'category_id'));
    }

    public function detail($id)
    {
        $categories = Categories::all();

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

        $floorPlanSlideImages = FloorPlanSlideImages::join('plans', 'floorPlanSlideImages.plan_id', 'plans.id')
            ->where('plans.id', $id)
            ->get();

        return view('testdesign.detail', compact('plan', 'floor_with_rooms', 'recommendeds', 'planSlideImages', 'floorPlanSlideImages', 'categories'));
    }

    public function access_denied()
    {
        return view('accessDenied');
    }
}