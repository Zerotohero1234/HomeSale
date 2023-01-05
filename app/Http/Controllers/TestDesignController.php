<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('testdesign.home');
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