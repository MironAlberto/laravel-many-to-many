<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Models
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $programmingTypes = [
            'HTML',
            'CSS',
            'SCSS',
            'JavaScript',
            'TypeScript',
            'Vue',
            'React',
            'Angular',
            'Svelte',
            'Java',
            'C#',
            'Python',
            'PHP',
            '.NET',
            'Node',
            'SQL',
            'Laravel',
            'Rust'
        ];

        foreach ($programmingTypes as $singleType) {
            $type = Type::create([
                'title' => $singleType
            ]);
        }
    }
}
