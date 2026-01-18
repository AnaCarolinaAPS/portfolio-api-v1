<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageTranslation;
use Illuminate\Http\Request;

class LanguageTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as entidades cadastradas
        return LanguageTranslation::with(['locale', 'language'])->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca pelo ID e retorna a entidade
        $languageTranslation = LanguageTranslation::with(['locale', 'language'])->findOrFail($id);
        return $languageTranslation;
    }
}
