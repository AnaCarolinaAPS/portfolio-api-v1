<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpokenLanguageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $locale = $request->get('locale') ?? app()->getLocale();

        return [
            'language' => $this->language
                ->translate($locale),

            'level' => $this->level
                ->translate($locale),
        ];
    }
}
