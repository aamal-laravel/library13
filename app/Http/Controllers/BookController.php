<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return [
            'success' => true,
            'message' => "all books ",
            'data' => $books
        ];
    }

    function getByTitle(Request $request){
        $title = $request->title;
       $books =  Book::where('title' , 'like' , "%$title%")->get();
    //    return $books;
       return [
            'success' => true,
            'message' => "books contain  $title",
            'data' => $books
        ];
    }

    function getByCategory(Request $request){
        $category_id = $request->category_id;
        $books = Book::where('category_id' , $category_id )->get();
        return $books;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // return $request;
       $book =  Book::create($request->all());
        return [
            'success' => true,
            'message' => "book added successfully ",
            'data' => $book
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return [
            'success' => true,
            'message' => "one added",
            'data' => $book
        ];
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        // return  $book;
        $book->update($request->all());
        return [
            'success' => true,
            'message' => "book updated successfully ",
            'data' => $book
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
         return [
            'success' => true,
            'message' => "book deleted successfully ",
            'data' => null
        ];
    }
}
