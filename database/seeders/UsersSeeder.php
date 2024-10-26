<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name'=> 'Administrador',
            'email'=> '     ',
            'password'=> bcrypt('admin@12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
