<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tables;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tables::create([
            'name'=>'Mesa 01'
        ]);
        Tables::create([
            'name'=>'Mesa 02'
        ]);
        Tables::create([
            'name'=>'Mesa 03'
        ]);
        Tables::create([
            'name'=>'Mesa 04'
        ]);
        Tables::create([
            'name'=>'Mesa 05'
        ]);
        Tables::create([
            'name'=>'Mesa 06'
        ]);
    }
}
