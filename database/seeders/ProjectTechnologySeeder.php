<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models 
use App\Models\Project;
use App\Models\Technology;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();

        $technologies = Technology::all();

        foreach ($projects as $project) {
            
            $randomTechnologies = rand(1, count($technologies));
            
            $mixingTechnologies = $technologies->shuffle()->take($randomTechnologies);
            
            $project->technologies()->attach($mixingTechnologies);
        }
    }
}
