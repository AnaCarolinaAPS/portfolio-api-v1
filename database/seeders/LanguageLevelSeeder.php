<?php

namespace Database\Seeders;

use App\Models\LanguageLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar os níveis dos idiomas
        LanguageLevel::insert([
            [
                'code' => 'native',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'fluent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'advanced',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'intermediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'beginner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
