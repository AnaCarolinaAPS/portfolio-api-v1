<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language_pt = Language::where('code', 'pt')->first();
        $language_en = Language::where('code', 'en')->first();
        $language_es = Language::where('code', 'es')->first();

        // Criar regiões
        Locale::insert([
            [
                'code' => 'pt-BR',
                'language_id' => $language_pt->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'pt-PT',
                'language_id' => $language_pt->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'en-US',
                'language_id' => $language_en->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'en-GB',
                'language_id' => $language_en->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'es-PY',
                'language_id' => $language_es->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'es-ES',
                'language_id' => $language_es->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'code' => 'fr-FR',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'code' => 'it-IT',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'code' => 'de-DE',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
