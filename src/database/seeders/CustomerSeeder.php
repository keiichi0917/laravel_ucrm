<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class
        ]);

        \App\Models\Customer::factory(1000)->create();
    }
}
