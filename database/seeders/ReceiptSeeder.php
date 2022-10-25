<?php

namespace Database\Seeders;

use App\Enum\ReceiptStatus;
use App\Models\Category;
use App\Models\Receipt;
use App\Models\ReceiptIngredient;
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
            ->create()
            ->each(function (Receipt $receipt) {
                    /* Seed receipt_category table */
                    $receipt->categories()->sync(
                        Category::all()->random(5)->pluck('id')
                    );

                    /* Seed receipt_status */
                    $receipt->status()->create(['slug' => ReceiptStatus::random()]);
            });
    }
}
