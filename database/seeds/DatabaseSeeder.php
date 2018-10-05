<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
                    PermissoesSeeder::class,
                    GrupoPermissaoSeeder::class,
                    GruposSeeder::class,
                    UsersTablesSeeder::class,
                  ]);
    }
}
