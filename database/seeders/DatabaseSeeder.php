<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'xorticagreen',
            //'name' => fake()->name(),
            'email' => 'root@xorticagreen.net',
            'role' => 'root',
            'email_verified_at' => now(),
            'phone_number' => '+380969708778',
            'password' => '$2y$10$FaJsrjRvfJU7CTrx40x49.nXm.HTiXyCpwev1tSOd18knxggscIbm',
        ]);

        \App\Models\User::factory()->create(
            [
                'name' => fake()->name(),
                'email' => 'user@xorticagreen.net',
                'role' => 'order-manager',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
        \App\Models\User::factory()->create(
            [
                'name' => fake()->name(2),
                'email' => 'user2@xorticagreen.net',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );

        \App\Models\User::factory(20)->create();

//       $categories =  \App\Models\Category::factory(3)->make( //make and next create
//
//        );
//       dd($categories);
        \App\Models\Category::factory(5)->create();
    }
}
