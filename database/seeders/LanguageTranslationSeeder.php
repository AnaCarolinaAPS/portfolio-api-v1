<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\LanguageTranslation;
use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language_pt = Language::where('code', 'pt')->first();
        $language_en = Language::where('code', 'en')->first();
        $language_es = Language::where('code', 'es')->first();

        $locale_ptBr = Locale::where('code', 'pt-BR')->first();
        $locale_enUs = Locale::where('code', 'en-US')->first();
        $locale_esPy = Locale::where('code', 'es-PY')->first();

        // Criar traduções dos idiomas através das regiões
        LanguageTranslation::insert([
            //Traduções dos idiomas em Português BRASIL
            [
                'language_id' => $language_pt->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Português',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $language_en->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Inglês',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $language_es->id,
                'locale_id' => $locale_ptBr->id,
                'name' => 'Espanhol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Traduções dos idiomas em Inglês USA
            [
                'language_id' => $language_pt->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Portuguese',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $language_en->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'English',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $language_es->id,
                'locale_id' => $locale_enUs->id,
                'name' => 'Spanish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Traduções dos idiomas em Espanhol Paraguayo
            [
                'language_id' => $language_pt->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Portugués',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $language_en->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Inglés',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'language_id' => $language_es->id,
                'locale_id' => $locale_esPy->id,
                'name' => 'Español',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
