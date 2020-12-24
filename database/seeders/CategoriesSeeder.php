<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            'name'=> 'Escolar notebooks',
            'description'=> 'Cuadernos, cuadernillos, carpetas, biblioratos, papelería anillada',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name'=> 'Escolar lapiceros',
            'description'=> 'Lápices de escribir, lápices de colores, lapiceras tinta, bolígrafos',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name'=> 'Marroquinería mochilas',
            'description'=> 'Mochilas escolares con y son carro, morrales deportivos.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name'=> 'Marroquinería carteras',
            'description'=> 'Carteras y bandoleras para mujer, riñoneras hombre y mujer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name'=> 'Juguetería muñecos',
            'description'=> 'Babies gigantes - medianos y chicos, Barbie y alternativas, Princesas, Super héroes, Zombies, Dragon Ball Z',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name'=> 'Juguetería aprendizaje',
            'description'=> 'Pizarras, Sets montables de cocina - maquillaje - fastfood - Carpintería y herramientas | +3 / +12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
