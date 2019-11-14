<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CourseCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'introduction' => $this->introduction,
            'thumbnail_picture' => $this->thumbnail_picture,
            'is_published' => $this->is_published,
            'slug' => $this->slug,
            'featured' => $this->featured,
            'price' => $this->price,
            'difficulty' => $this->difficulty,
            'category' => $this->category->name
        ];
    }
}
