<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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
        return view('testdesign.home', compact('categories_results'));
    }

    public function detail(Request $request)
    {
        $floor1 = array(
            array(
                "room" => "Volvo",
                "size" => `11'8" x 10'4"`,
                "ceiling" => `~ 8'0"`,
            ),
            array(
                "room" => "Volvo",
                "size" => `11'8" x 10'4"`,
                "ceiling" => `~ 8'0"`,
            ),
            array(
                "room" => "Volvo",
                "size" => `11'8" x 10'4"`,
                "ceiling" => `~ 8'0"`,
            ),
            array(
                "room" => "Volvo",
                "size" => `11'8" x 10'4"`,
                "ceiling" => `~ 8'0"`,
            ),
        );

        return view('testdesign.detail', compact('floor1'));
    }

    public function access_denied()
    {
        return view('accessDenied');
    }
}