<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'headline' => $this->headline,
            'title'   => $this->title,
            'summary'  => $this->summary,
            'about_me'  => $this->about_me,
            'locale'  => $this->profile->locale->code, // ex: en-US
        ];
    }
}
