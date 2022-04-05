<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuperHerosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => [
                'type' => 'superHeros',
                'id' => $this->resource->getRouteKey(),
                'name' => $this->resource->name,
//                'links' => [
//                    'self' => route('api.v1.superHeros.show', $this->resource)
//                ]
            ]
        ];
    }
}
