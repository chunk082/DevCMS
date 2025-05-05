<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'img' => $this->img,
            'content' => $this->content,
            'published_by' => $this->published_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // Optionally include relationships
            'user' => new NewsResource($this->whenLoaded('user')),
        ];
    
    }
}
