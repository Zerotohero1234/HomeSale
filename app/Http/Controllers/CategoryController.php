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
                ->rightJoin('categories As b', 'b.parent', 'categories.id')
                ->get()) / 10),
            'offset' => 1,
            'all' => sizeof(Categories::select('categories.*')
                ->rightJoin('categories As b', 'b.parent', 'categories.id')
                ->get())
        ];
        $categories = Categories::select('categories.cate_name As parent_name', 'b.*')
            ->rightJoin('categories As b', 'b.parent', 'categories.id')
            ->orderBy('categories.id', 'asc')
            ->limit(10)
            ->get();

        $all_categories = Categories::select('categories.cate_name As parent_name', 'b.*')
            ->rightJoin('categories As b', 'b.parent', 'categories.id')
            ->orderBy('categories.id', 'asc')
            ->get();

        return view('categories', compact('categories', 'all_categories', 'pagination'));
    }

    public function pagination($offset)
    {
        $provinces = Provinces::all();
        $districts = Districts::all();
        $pagination = [
            'offsets' => ceil(sizeof(Categories::select('branchs.*')
                ->join('districts', 'branchs.district_id', 'districts.id')
                ->join('provinces', 'districts.prov_id', 'provinces.id')
                ->where('branchs.enabled', '1')
                ->get()) / 10),
            'offset' => $offset,
            'all' => sizeof(Categories::select('branchs.*')
                ->join('districts', 'branchs.district_id', 'districts.id')
                ->join('provinces', 'districts.prov_id', 'provinces.id')
                ->where('branchs.enabled', '1')
                ->get())
        ];
        $branchs = Categories::select('branchs.*')
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
        $category = new Categories;
        $category->cate_name = $request->name;
        $category->cate_level = $request->cate_level;
        $category->parent = $request->cate_level == "main" ? NULL : ($request->cate_level == "sub" ? $request->parent1 : $request->parent2);

        if ($category->save()) {
            return redirect('categories')->with(['error' => 'insert_success']);
        } else {
            return redirect('categories')->with(['error' => 'not_insert']);
        }
    }

    public function edit($id)
    {
        $category = Categories::where('id', $id)->first();
        $all_categories = Categories::select('categories.cate_name As parent_name', 'b.*')
            ->rightJoin('categories As b', 'b.parent', 'categories.id')
            ->orderBy('categories.id', 'asc')
            ->get();

        return view('editCategory', compact('category', 'all_categories'));
    }

    public function update(Request $request)
    {
        $category = [
            'cate_name' => $request->name,
            'cate_level' => $request->cate_level,
            'parent' => $request->cate_level == "main" ? NULL : ($request->cate_level == "sub" ? $request->parent1 : $request->parent2)
        ];

        if (Categories::where('id', $request->id)->update($category)) {
            return redirect('categories')->with(['error' => 'insert_success']);
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