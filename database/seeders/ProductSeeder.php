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
          'name' => '1/8 Pollo',
          'description'=> '1/8 de Pollo a la brasa entero con papas + ensalada',  
          'price'=> '11.00',
          'stock'=> '10',
          'alerts'=> '2',
          'category_id'=> '1'
        ]);
        Product::create([
            'name' => '1/4 Pollo',
            'description'=> ' 1/4 de Pollo a la brasa con papas + ensalada',  
            'price'=> '17.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '1'
          ]);
          Product::create([
            'name' => '1/2 Pollo',
            'description'=> 'Medio Pollo a la brasa con papas + ensalada',  
            'price'=> '30.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '1'
          ]);
          Product::create([
            'name' => '1 Pollo',
            'description'=> 'Pollo a la brasa con papas + ensalada',  
            'price'=> '54.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '1'
          ]);

          Product::create([
            'name' => 'Promo 1',
            'description'=> '1/2 Pollo + Chaufa familiar + Papas familiar + Ensalada familiar.',  
            'price'=> '35.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '2'
          ]);
          Product::create([
            'name' => 'Promo 2',
            'description'=> '1 Pollo + Chaufa familiar + Papas familiar + Ensalada familiar.',  
            'price'=> '59.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '2'
          ]);

          Product::create([
            'name' => 'Porción de papas regular',
            'description'=> 'Papas Fritas tamaño regular',  
            'price'=> '5.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '3'
          ]);
          Product::create([
            'name' => 'Porción de papas familiar',
            'description'=> 'Papas Fritas tamaño regular',  
            'price'=> '10.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '3'
          ]);
          Product::create([
            'name' => 'Porción regular chaufa',
            'description'=> 'Chaufa tamaño regular',  
            'price'=> '5.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '3'
          ]);
          Product::create([
            'name' => 'Porción familiar chaufa',
            'description'=> 'Chaufa tamaño familiar',  
            'price'=> '10.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '3'
          ]);

          Product::create([
            'name' => 'Mostrito 1',
            'description'=> '1/8 Pollo + papas + chaufa',  
            'price'=> '13.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '4'
          ]);
          Product::create([
            'name' => 'Mostrito 2',
            'description'=> '1/4 Pollo + papas + chaufa',  
            'price'=> '19.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '4'
          ]);

          Product::create([
            'name' => 'Hamburguesa Artesanal',
            'description'=> 'Hamburguesa Artesanal + papas fritas',  
            'price'=> '15.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '5'
          ]);

          Product::create([
            'name' => 'Alitas picantes',
            'description'=> 'Alitas picantes con papas',  
            'price'=> '16.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '6'
          ]);
          Product::create([
            'name' => 'Alitas BBQ',
            'description'=> 'Alitas BBQ con papas',  
            'price'=> '16.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '6'
          ]);

          Product::create([
            'name' => 'Inca Kola 1L',
            'description'=> 'Inca Kola 1L Helada',  
            'price'=> '8.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '7'
          ]);
          Product::create([
            'name' => 'Inca Kola 500ML',
            'description'=> 'Inca Kola 500ML Helada',  
            'price'=> '4.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '7'
          ]);
          Product::create([
            'name' => 'Coca Cola 500ML',
            'description'=> 'Coca Cola 500 ML Helada',  
            'price'=> '4.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '7'
          ]);
          Product::create([
            'name' => 'Refresco 500ML',
            'description'=> 'Refresco 500 ML helado',  
            'price'=> '5.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '7'
          ]);
          Product::create([
            'name' => 'Refresco 1L',
            'description'=> 'Refresco 1L helado',  
            'price'=> '10.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '7'
          ]);
          Product::create([
            'name' => 'Agua',
            'description'=> 'Agua San Luis',  
            'price'=> '3.00',
            'stock'=> '10',
            'alerts'=> '2',
            'category_id'=> '7'
          ]);
    }
}
