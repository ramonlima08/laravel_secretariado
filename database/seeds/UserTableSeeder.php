<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'admin@gmail.com',
            'name' => 'Administrador',
            'profile' => 1,
            'password' => Hash::make('123456789')
        ]);
    }
}
