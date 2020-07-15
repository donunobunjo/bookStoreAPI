<?php

namespace App\Http\Controllers;
use App\Book;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth:api','admin'])->except(['index']);
    }
    public function index()
    {
        return BookResource::collection(Book::with('reviews')->paginate(10));
    }

    
    public function store(Request $request)
    {
        //validating
        $validator = Validator::make($request->all(),[
            'isbn'=>'required|unique|max:13',
            'title'=>'required',
            'description'=>'required'

        ]);
        if ($validator->fails()){
            Response::json(['errors'=>$validator->errors()],422);
        }

        //Pesisting to database
        $book = Book::create([
            'isbn'=>$request->isbn,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
