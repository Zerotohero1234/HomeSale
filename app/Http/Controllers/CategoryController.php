<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class CategoryController extends Controller
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
            'offsets' => ceil(sizeof(Categories::select('categories.*')
                ->get()) / 10),
            'offset' => 1,
            'all' => sizeof(Categories::select('categories.*')
                ->get())
        ];
        $categories = Categories::select('categories.*')
            ->orderBy('categories.id', 'desc')
            ->limit(10)
            ->get();

        return view('categories', compact('categories', 'pagination'));
    }

    public function insert(Request $request)
    {
        $category = new Categories;
        $category->cate_name = $request->name;
        $category->cate_en_name = $request->cate_en_name;
        $category->cate_cn_name = $request->cate_cn_name;
        $category->cate_th_name = $request->cate_th_name;
        if ($category->save()) {
            return redirect('categories')->with(['error' => 'insert_success']);
        } else {
            return redirect('categories')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $category = Categories::where('id', $id)->first();
        $all_categories = Categories::select('categories.*')
            ->orderBy('categories.id', 'asc')
            ->get();

        return view('editCategory', compact('category', 'all_categories'));
    }

    public function update(Request $request)
    {
        $category = [
            'cate_name' => $request->name,
            'cate_en_name' => $request->cate_en_name,
            'cate_cn_name' => $request->cate_cn_name,
            'cate_th_name' => $request->cate_th_name,
        ];

        if (Categories::where('id', $request->id)->update($category)) {
            return redirect('categories')->with(['error' => 'edit_success']);
        } else {
            return redirect('categories')->with(['error' => 'not_insert']);
        }
    }

    public function delete($id)
    {
        $branch = [
            'enabled' => '0'
        ];

        if (Categories::where('id', $id)->update($branch)) {
            return redirect('branchs')->with(['error' => 'delete_success']);
        } else {
            return redirect('branchs')->with(['error' => 'not_insert']);
        }
    }
}