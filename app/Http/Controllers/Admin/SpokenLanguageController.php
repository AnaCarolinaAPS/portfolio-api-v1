<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LanguageLevelTranslation;
use App\Models\LanguageTranslation;
use App\Models\Profile;
use App\Models\SpokenLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SpokenLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session(['current_profile_id'])) {
            $userDefaultPerfil = Profile::where('locale_id', Auth::user()->locale_default)->first();
            // Atualiza a session
            session([
                'current_profile_id' => $userDefaultPerfil->id,
            ]);
        }

        //Idiomas que o usuário tem no perfil
        $spoken_languages = Auth::user()->languages()->pluck('language_id');

        //Filtra para somente linguages que o usuário ainda não adicionou
        $languages = Language::whereNotIn('id', $spoken_languages)
                                ->get();

        //Busca todos os leveis disponíveis para linguagem
        $levels = LanguageLevelTranslation::where('locale_id', Auth::user()->currentProfile()?->locale->id)->get();

        return view('admin.spoken-languages', compact('languages', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'language_id' => [
                'required',
                'exists:languages,id',
                Rule::unique('spoken_languages')->where(fn ($q) =>
                    $q->where('user_id', Auth::id())
                ),
            ],
            'level_id' => 'required|exists:language_levels,id',

        ]); // Validação para existir apenas 1 profile com user + locale_id

        // Criação de uma nova entidade no banco de dados
        Auth::user()->languages()->create([
            'language_id' => $request->language_id,
            'level_id' => $request->level_id,
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpokenLanguage $spokenLanguage)
    {
        // Validação dos dados do formulário
        $request->validate([
            'level_id' => 'required|exists:language_levels,id',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Atualiza os dados da entidade
        $spokenLanguage->update([
            'level_id' => $request->input('level_id'),
            // Adicione outros campos conforme necessário
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpokenLanguage $spokenLanguage)
    {
        $spokenLanguage->delete();
        return redirect()->back();
    }
}
