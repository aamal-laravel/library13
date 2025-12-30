<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\CategoryResourse;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    function index(Request  $request)
    {
        // if (Cookie::has('language')){
        //     $cookie = Cookie::get('language');
        //     App::setlocale($cookie);
        // }

        // $categories = Category::all();
        $categories = Category::withCount('books')->get();
        // $categories = Category::with('books')->get();
        // return $categories;
        if ($request->is('api/*'))
            return ResponseHelper::success("all category", CategoryResourse::collection($categories));
        else
            return view('categories.index', compact('categories'));
    }
    function create()
    {
        return view('categories.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:categories'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        if ($request->is('api/*'))
            return [
                'success' => true,
                'message' => "category added successfully",
                'data' => $category
            ];
        else
            return redirect('categories');
    }


    function show($id)
    {
        $category = Category::find($id);
        return ResponseHelper::success("one category", new CategoryResourse($category));
    }


    function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    function update(Request $request, $id)
    {
        //except: pk of excepted record
        $request->validate([
            'name' => "required|max:50|unique:categories,name,$id"
        ]);
        // return $request;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        if ($request->is('api/*'))
            return [
                'success' => true,
                'message' => "category updated successfully",
                'data' => $category

            ];
        else
            return redirect()->route('categories.index');
    }
    function destroy($id, Request $request)
    {
        $category = Category::find($id);


        if ($category->books->count())
            if ($request->is('api/*'))
                return [
                    'success' => false,
                    'message' => "can't delete category has books",
                ];
            else
                return redirect()->route('categories.index');




        $category->delete();
        if ($request->is('api/*'))
            return [
                'success' => true,
                'message' => "category deleted successfully"
            ];
        else
            return redirect()->route('categories.index');
    }
}
