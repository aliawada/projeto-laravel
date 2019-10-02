<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'cpf' => '12345678910',
            'name' => 'Ali Awada',
            'phone' => '4599999999',
            'birth' => '1999-01-30',
            'gender' => 'M',
            'notes' => 'desenvolvedor do sistema',
            'email' => 'awadinha99@gmail.com',
            'password' => \env('PASSWORD_HASH') ? bcrypt('senha12345') : 'senha12345'
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
