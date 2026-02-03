<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session('current_profile_id')) {
            $userDefaultPerfil = Profile::where('locale_id', Auth::user()->locale_default)->first();
            // Atualiza a session
            session([
                'current_profile_id' => $userDefaultPerfil->id,
            ]);
        }

        return view('admin.education');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'degree' => 'required|string',
            'institution' => 'required|string',
            'observation' => 'nullable|string',
        ]);

        $current_profile = Profile::find(session('current_profile_id'));
        if (!$current_profile) {
            $current_profile = Profile::where('locale_id', Auth::user()->locale_default)->first();
        }

        // Criação de uma nova entidade no banco de dados
        $education = Auth::user()->educations()->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Criação de uma nova entidade de acordo com o LOCALE / Perfil atual
        $education->translations()->create([
            'locale_id'   => $current_profile->locale_id,
            'degree'      => $request->degree,
            'institution' => $request->institution,
            'observation' => $request->observation,
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        // Validação dos dados do formulário
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'degree' => 'required|string',
            'institution' => 'required|string',
            'observation' => 'nullable|string',
        ]);

        // Atualiza os dados da entidade
        $education->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            // Adicione outros campos conforme necessário
        ]);

        $current_profile = Profile::find(session('current_profile_id'));

        if (!$current_profile) {
            $current_profile = Profile::where('locale_id', Auth::user()->locale_default)->first();
        }

        $translation = $education->translate($current_profile->locale->code);

        if ($translation) {
            $translation->update([
                'degree'      => $request->degree,
                'institution' => $request->institution,
                'observation' => $request->observation,
                // Adicione outros campos conforme necessário
            ]);
        } else {
            // Criação de uma nova entidade de acordo com o LOCALE / Perfil atual
            $education->translations()->create([
                'locale_id'   => $current_profile->locale_id,
                'degree'      => $request->degree,
                'institution' => $request->institution,
                'observation' => $request->observation,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back();
    }
}
