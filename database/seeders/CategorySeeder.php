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
        'breakfast',
        'lunch',
        'stake',
        'omelette',
        'roast',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(fn ($category) => Category::updateOrCreate(['name' => $category]),self::CATEGORIES);
    }
}
