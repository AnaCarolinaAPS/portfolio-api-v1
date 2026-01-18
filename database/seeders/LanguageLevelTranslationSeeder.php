<?php

namespace Database\Seeders;

use App\Models\LanguageLevel;
use App\Models\LanguageLevelTranslation;
use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageLevelTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Busca os níveis pré existentes
        $level_native = LanguageLevel::where('code', 'native')->first();
        $level_fluent = LanguageLevel::where('code', 'fluent')->first();
        $level_advanced = LanguageLevel::where('code', 'advanced')->first();
        $level_intermediate = LanguageLevel::where('code', 'intermediate')->first();
        $level_beginner = LanguageLevel::where('code', 'beginner')->first();

        //Busca as regiões pré existentes
        $locale_ptBr = Locale::where('code', 'pt-BR')->first();
        $locale_enUs = Locale::where('code', 'en-US')->first();
        $locale_esPy = Locale::where('code', 'es-PY')->first();

        // Criar traduções dos níveis dos idiomas através das regiões
        LanguageLevelTranslation::insert([
            //Traduções dos níveis dos idiomas em Português BRASIL
            [
                'language_level_id' => $level_native->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Nativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_fluent->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Fluente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_advanced->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Avançado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_intermediate->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Intermediário',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_beginner->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Básico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Traduções dos níveis dos idiomas em Inglês USA
            [
                'language_level_id' => $level_native->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Native',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_fluent->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Fluent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_advanced->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Advanced',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_intermediate->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Intermediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_beginner->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Beginner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Traduções dos níveis dos idiomas em Espanhol Paraguayo
            [
                'language_level_id' => $level_native->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Nativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_fluent->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Fluido',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_advanced->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Avanzado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_intermediate->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Intermedio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $level_beginner->id,
                'locale_id' => $locale_esPy ->id,
                'name' => 'Principiante',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
