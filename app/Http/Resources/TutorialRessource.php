<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class TutorialRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'video_id' => $this->video_id,
            'thumbnail_picture' => $this->thumbnail_picture,
            'is_published' => $this->is_published,
            'is_reported' => $this->is_reported,
            'nb_views' => $this->nb_views,
            'nb_likes' => $this->nb_likes,
            'category' => Category::where('id', '=', $this->category_id),
            'user_id' => $this->user->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
