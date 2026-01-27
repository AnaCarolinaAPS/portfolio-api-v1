<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InformationResource;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $language)
    {
        $user = auth()->user();

        $profile = $user->profiles()
            ->whereHas('locale', fn ($q) => $q->where('code', $language))
            ->where('is_active', true)
            ->first();

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found for this language'
            ], 404);
        }

        return response()->json([
            'information' => new InformationResource($profile->information),
        ]);
    }
}
