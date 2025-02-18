<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedResource extends JsonResource
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
            'id' => $this->id,
            'color' => $this->color,
            'creator' => new UserResource($this->creator),
            'body' => $this->body,
            'comments' => CommentsResource::collection($this->comments),
            'comments_count'=> $this->comments_count,
            'created_at' => $this->created_at->timestamp,
        ];
    }
}
