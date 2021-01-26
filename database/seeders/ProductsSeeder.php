<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'code' => 'COD1PRB',
            'name' => 'Mochila footy para nena1',
            'description' => 'Con lentejuelas y carro. 4 cierres. 5 bolsillos.',
            'price_amount' => '455543',
            'price_currency' => 'ARS',
            'provider_id' => '3',
            'category_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'code' => 'COD2TEST',
            'name' => 'Lápices faber castel x24',
            'description' => 'Caja de lápices de colores FaberCastel x24 unidades + sacapuntas de regalo.',
            'price_amount' => '93810',
            'price_currency' => 'ARS',
            'provider_id' => '1',
            'category_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'code' => 'NEWCOD12',
            'name' => 'Set de arte niños y niñas',
            'description' => 'Set de arte para niños y niñas con 9 piezas + librito para pintar.',
            'price_amount' => '131588',
            'price_currency' => 'ARS',
            'provider_id' => '6',
            'category_id' => '6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'code' => 'NEWCOD13',
            'name' => 'Mochila footy para nena2',
            'description' => 'Con lentejuelas y carro. 4 cierres. 5 bolsillos.',
            'price_amount' => '543010',
            'price_currency' => 'ARS',
            'provider_id' => '3',
            'category_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
