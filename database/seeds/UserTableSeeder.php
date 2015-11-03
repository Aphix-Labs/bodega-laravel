<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Rodri',
        ]);

        factory(App\User::class)->create([
            'name' => 'Hacker',
        ]);

        factory(App\User::class)->create([
            'name' => 'Chasca',
        ]);
    }
}
