<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return [
            'success' => true,
            'message' => "all category ",
            'data' => $categories
        ];
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:categories'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return [
            'success' => true,
            'message' => "category added successfully",
            'data' => $category
        ];
    }

    function show($id)
    {
        $category = Category::find($id);
        return [
            'success' => true,
            'message' => "one category",
            'data' => $category
        ];
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
        return [
            'success' => true,
            'message' => "category updated successfully",
            'data' => $category

        ];
    }
    function destroy($id)
    {
        $category = Category::find($id);
        if ($category->books->count())
            return [
                'success' => false,
                'message' => "can't delete category has books",
            ];

        $category->delete();
        return [
            'success' => true,
            'message' => "category deleted successfully"
        ];
    }
}
