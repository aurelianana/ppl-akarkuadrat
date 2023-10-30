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
        // generate user nim and password 200555xxxx
        for ($i = 1000; $i <= 1200; $i++) {
            User::create([
                'nim' => '190555' . $i,
                'password' => bcrypt('190555' . $i),
            ]);
        }
    }
}
