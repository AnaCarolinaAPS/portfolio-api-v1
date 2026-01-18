<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LanguageLevel;
use Illuminate\Http\Request;

class LanguageLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as entidades cadastradas
        return LanguageLevel::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca pelo ID e retorna a entidade
        $languageLevel = LanguageLevel::findOrFail($id);
        return $languageLevel;
    }
}
