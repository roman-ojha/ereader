<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalCategory = Category::count();
        $filePath = storage_path('app/data/ebook.json');
        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $books = json_decode($jsonData, true);
            foreach ($books as $key => $book) {
                // Product::create([
                //     'name' => $book['name'],
                //     'slug' => $book['slug'],
                //     'price' => $book['price'] * 100,
                //     'description' => $book['description'],
                //     'quantity' => $book['quantity'],
                //     'image_url' => $book['imageUrl'],
                //     'author' => fake()->name(),
                //     'page' => fake()->numberBetween(150, 500),
                // ]);
                $product = new Product();
                $product->name = $book['name'];
                $product->slug = $book['slug'];
                $product->price = $book['price'] * 100;
                $product->description = $book['description'];
                $product->quantity = $book['quantity'];
                $product->image_url = $book['imageUrl'];
                $product->author = fake()->name();
                $product->page = fake()->numberBetween(150, 500);
                $product->save();
                $product->categories()->attach(rand(1, $totalCategory));
            }
        }
        // Product::factory()->count(50)->create();
    }
}
