<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpokenLanguageResource;
use App\Models\Locale;
use Illuminate\Http\Request;

class SpokenLanguageController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $language)
    {
        $user = auth()->user();

        //De acordo com o code informado, busca enviar as traduções dos idiomas falados pelo usuário e seus respectivos níveis
        $spokenLanguages = auth()->user()
                            ->languages()
                            ->with([
                                'language.translations.locale',
                                'level.translations.locale',
                            ])
                            ->get();

        if ($spokenLanguages->isEmpty()) {
            return response()->json([
                'message' => 'No languages added for this user'
            ], 404);
        }

        request()->merge([
            'locale' => $language
        ]);

        return response()->json([
            'languages' => SpokenLanguageResource::collection($spokenLanguages),
        ]);
    }
}
