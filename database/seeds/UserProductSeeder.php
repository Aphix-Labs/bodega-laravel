<?php

use Illuminate\Database\Seeder;
use App\User;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rodri
        $userId = User::whereName('Rodri')->first()->id;

        DB::table('product_user')->insert([
            'user_id' => $userId,
            'product_code' => 14525
        ]);
    }
}
