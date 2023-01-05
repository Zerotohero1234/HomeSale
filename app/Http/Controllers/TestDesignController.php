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
        return view('testdesign.detail');
    }

    public function access_denied(){
        return view('accessDenied');
    }
}
