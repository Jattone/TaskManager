<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public static $wrap = 'task';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"                        => $this->id,
            "assignee"                  => $this->assignee,
            "name"                      => $this->name,
            "description"               => $this->description,
            "status"                    => $this->status,
            "date of creation"          => $this->created_at->format('d.m.Y H:i:s'),
            "date of last modification" => $this->updated_at->format('d.m.Y H:i:s'),
        ];
    }
}
