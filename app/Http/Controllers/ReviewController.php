<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Review;
use App\Http\Resources\ReviewResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //Restrict access to only authenticated users
    public function __construct()
    {
      $this->middleware(['auth:api']);
    }    
    public function index()
    {
        //
    }

   
    public function store(Request $request, Book $book)
    {
        //Validate the review
        $validator = Validator::make($request->all(),[
            'review'=>'required|exists',
            'comment'=>'required',
        ]);
        if ($validator->fails()){
            Response::json(['errors'=>$validator->errors()],422);
        }

        //Store the review in the database
        $review = Review::firstOrCreate(
            [
              'user_id' => $request->user()->id,
              'book_id' => $request->$book->id,
            ],
            [
                'review' => $request->review,
                'comment' => $request->comment
            ]
          );
    
          return new ReviewResource($review);
    }

    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
