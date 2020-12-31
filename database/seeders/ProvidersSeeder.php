<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('providers')->truncate();

        DB::table('providers')->insert([
            'code' => 'ONCE11',
            'name' => 'El once',
            'description' => 'Mayorista de librería y subrubros https://www.eloncemayorista.com.ar/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'MUR123',
            'name' => 'Murad',
            'description' => 'Mayorista en juguetería y regalería https://www.muradjuguetes.com.ar/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'FREIB1',
            'name' => 'Freiberg Mayorista',
            'description' => 'Proveedor polirubro http://www.freiberg.com.ar/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV4',
            'name' => 'Proveedor 4',
            'description' => 'Proveedor 4 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV5',
            'name' => 'Proveedor 5',
            'description' => 'Proveedor 5 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV6',
            'name' => 'Proveedor 6',
            'description' => 'Proveedor 6 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV7',
            'name' => 'Proveedor 7',
            'description' => 'Proveedor 7 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV8',
            'name' => 'Proveedor 8',
            'description' => 'Proveedor 8 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV9',
            'name' => 'Proveedor 9',
            'description' => 'Proveedor 9 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('providers')->insert([
            'code' => 'PROV11',
            'name' => 'Proveedor 11',
            'description' => 'Proveedor 11 de prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
