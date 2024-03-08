<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Models
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        $allTechnologies = [
            'Generative AI',
            'Cybersecurity',
            'Sustainable Tech Solutions',
            'Cloud Computing & DevOps',
            'Data Science & Analytics',
            'Human-Computer Interaction',
            'Blockchain',
            'Full Stack Web Development'
        ];

        foreach ($allTechnologies as $singleTechnology) {
            $technology = Technology::create([
                'title' => $singleTechnology
            ]);
        }

    }
}
