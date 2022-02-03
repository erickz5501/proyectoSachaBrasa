<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
          'name' => 'Pollo entero',
          'description'=> 'Pollo a la brasa entero con papas + ensalada',  
          'price'=> '50',
          'stock'=> '10',
          'alerts'=> '2',
          'category_id'=> '1'
        ]);
        Product::create([
            'name' => '!/4 Pollo',
            'description'=> ' 1/4 de Pollo a la brasa con papas + ensalada',  
            'price'=> '16',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '2'
          ]);
          Product::create([
            'name' => '1/2 Pollo',
            'description'=> 'MEdio Pollo a la brasa con papas + ensalada',  
            'price'=> '25',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '3'
          ]);
          Product::create([
            'name' => '1/8 pollo',
            'description'=> '1/8 de Pollo a la brasa con papas + ensalada',  
            'price'=> '13',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '4'
          ]);
    }
}
