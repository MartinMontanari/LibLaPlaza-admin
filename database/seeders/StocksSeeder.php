<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('stocks')->insert([
            'quantity' => 4,
            'product_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('stocks')->insert([
            'quantity' => 12,
            'product_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('stocks')->insert([
            'quantity' => 25,
            'product_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('stocks')->insert([
            'quantity' => 3,
            'product_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
