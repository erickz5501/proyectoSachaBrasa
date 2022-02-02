<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=> 'Pollo a la Brasa'
        ]);
        Category::create([
            'name'=> 'Hambuerguesa'
        ]);
        Category::create([
            'name'=> 'Alitas'
        ]);
        Category::create([
            'name'=> 'Chaufas'
        ]);
        Category::create([
            'name'=> 'Bebidas'
        ]);
    }
}
