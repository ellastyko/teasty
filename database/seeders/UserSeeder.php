<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') == 'local') {
            User::factory()->create(['email' => 'vadimsergeev1337@gmail.com']);

            User::factory(10)->create();
        }
    }
}
