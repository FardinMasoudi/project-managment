<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reporter' => $this->reporter->name,
            'assign_to' => $this->assignTo->name,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status->title,
            'deadline_time' => $this->deadline_time
        ];
    }
}
