<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SprintResource extends JsonResource
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
            'goal' => $this->goal,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status->title
        ];
    }
}
