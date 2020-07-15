<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'user_id' => $this->user_id,
        'book_id' => $this->book_id,
        'review' => $this->review,
        'comment'=> $this->comment,
        'book' => $this->book,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
       ];
    }
}
