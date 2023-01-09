<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Resources\V1\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
             //Log::debug($request->sort);
             switch($request->sort) {
                case 'title':
                    return BookResource::collection(Book::orderBy('title')->paginate());
                case '-title':
                    return BookResource::collection(Book::orderBy('title', 'DESC')->paginate());
                case 'description':
                    return BookResource::collection(Book::orderBy('description')->paginate());
                case '-description':
                    return BookResource::collection(Book::orderBy('description', 'DESC')->paginate());
                case 'oldest':
                case '-latest':
                    return BookResource::collection(Book::oldest()->paginate());
                case 'latest':
                default:
                    return BookResource::collection(Book::latest()->paginate());
            }
        //return BookResource::collection(Book::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
