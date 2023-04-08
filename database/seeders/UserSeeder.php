<?php

namespace Database\Seeders;

use App\Enum\Role;
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
            User::factory()
                ->create(['email' => 'vadimsergeev1337@gmail.com']);

            User::factory(10)->create()->each(fn($user) => $user->assignRole(Role::USER));
        }

        if (config('app.env') == 'production') {
            $admin = User::factory()
                ->createOne([
                    'email'    => env('SUPER_ADMIN_EMAIL'),
                    'password' => env('SUPER_ADMIN_PASSWORD')
                ]);
            $admin->assignRole(Role::ADMIN);
        }
    }
}
