<?php

namespace App\Http\Resources\Api\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'owner_id' => $this->owner_id,
            'title' => $this->title,
            'description' => $this->description,
            'color' => [
                'id' => $this->color->id,
                'name' => $this->color->name,
                'color' => $this->color->color,
            ]
        ];
    }
}
