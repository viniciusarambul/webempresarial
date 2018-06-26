<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Vinicius Arambul',
            'email'    => 'vinicius.vieira@hotmail.com',
            'password'   =>  Hash::make('vinicius12'),
            'remember_token' =>  str_random(10),
        ]);
    }
}
