<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 =  User::updateOrCreate([
            'email' => 'ramon@pensajur.com.br',
            'name' => 'Ramon Lima',
            'profile' => 1,
            'password' => Hash::make('12345678')
        ]);
    }
}
