<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private const CATEGORIES = [
        'pizza',
        'pies',
        'pilaf',
        'fast',
        'milkshakes',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(array_map(fn($category) => ['name' => $category],self::CATEGORIES));
    }
}
