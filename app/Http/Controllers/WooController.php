<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Product;

// https://codexshaper.github.io/docs/laravel-woocommerce/

class WooController extends Controller
{
    public function cupones()
    {
        $products = Product::all();
        dd($products);
    }

    public function updateproducto()
    {
        $product_id = 21;
        $data       = [
            'name' => 'Zapatos Nike de calidad baja',
            
        ];

        $product = Product::update($product_id, $data);
    }

    public function deleteproducto()
    {
        $product_id = 18;
        $options = ['force' => true]; // Set force option true for delete permanently. Default value false

        $product = Product::delete($product_id, $options);
    }

    public function createproducto(){
        $data = [
            'name' => 'Simple Product',
            'type' => 'simple',
            'regular_price' => '10.00',
            'description' => 'Simple product full description.',
            'short_description' => 'Simple product short description.',
            'categories' => [
                [
                    'id' => 1
                ],
                [
                    'id' => 3
                ],
                [
                    'id' => 5
                ]
            ],
            'images' => [
                [
                    'src' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/a42a5d53-2f99-4e78-a081-9d07a2d0774a/calzado-air-force-1-07-xDpsTk.png'
                ],
                [
                    'src' => 'https://static.nike.com/a/images/c_limit,w_318,f_auto/t_product_v1/057c2bbd-d065-44eb-913f-51dd4f98d680/calzado-air-force-1-07-xDpsTk.png'
                ]
            ]
        ];
        
        $product = Product::create($data);
    }
}
