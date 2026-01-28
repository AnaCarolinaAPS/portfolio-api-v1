<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar idiomas
        Language::insert([
            [
                'code' => 'pt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'es',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'code' => 'fr',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'code' => 'it',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'code' => 'de',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}
