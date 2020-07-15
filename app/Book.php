<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn','title','description'];

    public function authors()
    {
      return $this->hasMany(Author::class);
    }

    public function reviews()
    {
      return $this->hasMany(Review::class);
    }
}
