<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['review','comment','user_id','book_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function book()
    {
      return $this->belongsTo(Book::class);
    }
}
