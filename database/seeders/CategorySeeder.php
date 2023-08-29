<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genresPath = storage_path('app/data/genres.json');
        if (file_exists($genresPath)) {
            $genresData = file_get_contents($genresPath);
            $genres = json_decode($genresData, true);
            foreach ($genres as $key => $genre) {
                Category::create([
                    'name' => $genre['name'],
                    'slug' => str()->slug($genre['name']),
                    'description' => fake()->text(),
                    'image_url' => fake()->imageUrl(),
                ]);
            }
        }
        // Category::factory()->count(20)->create();
    }
}
