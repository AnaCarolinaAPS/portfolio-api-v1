<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Retorna o Information de acordo com o Profile atual
        $information = Information::where('profile_id', session('current_profile_id'))->first();
        return view('admin.information', compact('information'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $information = Information::find($id);
        return response()->json($information);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        // Validação dos dados do formulário
        $request->validate([
            'headline' => 'nullable|string',
            'title' => 'nullable|string',
            'summary' => 'nullable|string',
            'about_me' => 'nullable|string',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Atualiza os dados da entidade
        $information->update([
            'headline' => $request->input('headline'),
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'about_me' => $request->input('about_me'),
            // Adicione outros campos conforme necessário
        ]);

        return redirect()->back();
    }
}
