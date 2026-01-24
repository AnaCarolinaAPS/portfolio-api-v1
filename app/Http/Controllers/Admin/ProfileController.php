<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'locale_id' => [
                'required',
                'exists:locales,id',
                Rule::unique('profiles')->where(fn ($q) =>
                    $q->where('user_id', Auth::id())
                ),
            ],
        ]); // Validação para existir apenas 1 profile com user + locale_id

        // Criação de uma nova entidade no banco de dados
        Auth::user()->profiles()->create([
            'locale_id' => $request->locale_id,
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        // Atualizar os dados da Entidade
        $profile->update([
            'is_active' => !$profile->is_active,
        ]);

        return redirect()->back();
    }
}
