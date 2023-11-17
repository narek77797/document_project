<?php

namespace App\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class IndexDocumentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'created_at' => Carbon::parse($this->resource->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->resource->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}