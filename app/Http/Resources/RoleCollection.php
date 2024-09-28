<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'data' => RoleResource::collection($this->collection),
            // 'links' => [
            //     'first' => $this->url(1),
            //     'last' => $this->url($this->lastPage()),
            //     'prev' => $this->previousPageUrl(),
            //     'next' => $this->nextPageUrl(),
            // ],
            // 'meta' => [
            //     'current_page' => $this->currentPage(),
            //     'from' => $this->firstItem(),
            //     'last_page' => $this->lastPage(),
            //     'path' => $this->path(),
            //     'per_page' => $this->perPage(),
            //     'to' => $this->lastItem(),
            //     'total' => $this->total(),
            // ],
        ];
    }
}
