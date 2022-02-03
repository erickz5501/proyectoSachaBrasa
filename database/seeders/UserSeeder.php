<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'PEdro',
            'last_name'=> 'lopez',
            'adress'=> 'jr.peru 123',
            'phone'=> '987456321',
            'email'=> '1234@gmail.com',
            'profile'=> 'ADMIN',
            'status'=> 'ACTIVO',
            'user'=> 'pedrol',
            'password'=> bcrypt('123456789')
        ]);
        User::create([
            'name'=> 'PEdro12',
            'last_name'=> 'lopez12',
            'adress'=> 'jr.peru 123',
            'phone'=> '987456321',
            'email'=> '121234@gmail.com',
            'profile'=> 'ADMIN',
            'status'=> 'ACTIVO',
            'user'=> 'pedrol2',
            'password'=> bcrypt('123456789')
        ]);
        User::create([
            'name'=> 'PEdro123',
            'last_name'=> 'lopez45',
            'adress'=> 'jr.peru 123',
            'phone'=> '987456321',
            'email'=> '1221334@gmail.com',
            'profile'=> 'TRABAJADOR',
            'status'=> 'ACTIVO',
            'user'=> 'pedro444l',
            'password'=> bcrypt('123456789')
        ]);
        User::create([
            'name'=> 'PEdro12414',
            'last_name'=> '1231',
            'adress'=> 'jr.peru 123',
            'phone'=> '987456321',
            'email'=> '131233444@gmail.com',
            'profile'=> 'ADMIN',
            'status'=> 'ACTIVO',
            'user'=> 'pedrol333',
            'password'=> bcrypt('123456789')
        ]);
        User::create([
            'name'=> 'PEdro',
            'last_name'=> 'lopez',
            'adress'=> 'jr.peru 123',
            'phone'=> '987456321',
            'email'=> '1123234@gmail.com',
            'profile'=> 'TRABAJADOR',
            'status'=> 'ACTIVO',
            'user'=> 'pedrol22',
            'password'=> bcrypt('123456789')
        ]);
    }
}
