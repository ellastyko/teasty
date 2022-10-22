<?php

namespace Database\Seeders;

use App\Models\Receipt;
use App\Models\ReceiptIngredient;
use App\Models\ReceiptStatus;
use App\Models\ReceiptStep;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Receipt::factory(20)
            ->has(ReceiptStep::factory(5))
            ->has(ReceiptIngredient::factory(5))
            ->has(ReceiptStatus::factory(1))
            ->create()
            ->each(fn(Receipt $receipt) => $receipt->categories()->sync([1]));
    }
}
