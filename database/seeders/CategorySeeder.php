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
            'name'=> 'Promos'
        ]);
        Category::create([
            'name'=> 'Guarniciones'
        ]);
        Category::create([
            'name'=> 'Mostritos'
        ]);
        Category::create([
            'name'=> 'Hamburguesas'
        ]);
        Category::create([
            'name'=> 'Alitas'
        ]);
        Category::create([
            'name'=> 'Bebidas'
        ]);
    }
}
