<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models 
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

// Helpers 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 15; $i++) { 
            $project = new Project();

            $randomType = Type::inRandomOrder()->first();

            $project->url = fake()->url();
            $project->title = fake()->sentence();
            $project->content = fake()->paragraph();
            $project->type_id = $randomType->id;
            $project->save();
        }
    }
}
