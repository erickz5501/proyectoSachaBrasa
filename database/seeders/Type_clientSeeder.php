<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type_client;

class Type_clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type_client::create([
            'name'=> 'Persona Juridica'
        ]);
        Type_client::create([
            'name'=> 'Persona Natural'
        ]);
    }
}
