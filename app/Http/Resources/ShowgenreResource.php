<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowgenreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [            
            'films' => GenreResource::collection($this->whenLoaded('films')),
            'films_pagination' => [
            'total' => $this->films->total(),
            'per_page' => $this->films->perPage(),
            'current_page' => $this->films->currentPage(),
            'last_page' => $this->films->lastPage(),
        ],
        ];
    }
}
