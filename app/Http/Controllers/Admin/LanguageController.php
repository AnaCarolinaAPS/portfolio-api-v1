<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as entidades cadastradas
        return Language::with('locales')->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca pelo ID e retorna a entidade
        $language = Language::with('locales')->findOrFail($id);
        return $language;
    }
}
