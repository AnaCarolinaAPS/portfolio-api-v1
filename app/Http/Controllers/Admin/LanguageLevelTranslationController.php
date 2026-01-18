<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageLevelTranslation;
use Illuminate\Http\Request;

class LanguageLevelTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as entidades cadastradas
        return LanguageLevelTranslation::with(['locale', 'languageLevel'])->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca pelo ID e retorna a entidade
        $languageLevelTranslation = LanguageLevelTranslation::with(['locale', 'languageLevel'])->findOrFail($id);
        return $languageLevelTranslation;
    }
}
