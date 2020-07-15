<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'book_id' => $this->book_id,
            'name' => $this->name,
            'surname'=> $this->surname,
            'book' => $this->book,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
           ];
    }
}
