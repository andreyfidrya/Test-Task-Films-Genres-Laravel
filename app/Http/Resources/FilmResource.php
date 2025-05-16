<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\GenreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'link' => $this->link,  
            'genres' => GenreResource::collection($this->whenLoaded('genres')),                     
        ];
    }
}
