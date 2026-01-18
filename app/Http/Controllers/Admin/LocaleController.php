<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as entidades cadastradas
        return Locale::with('language')->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busca pelo ID e retorna a entidade
        $locale = Locale::with('language')->findOrFail($id);
        return $locale;
    }
}
