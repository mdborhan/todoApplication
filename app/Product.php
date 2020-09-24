<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use BinaryCats\Sku\HasSku;

class Product extends Model
{
    use HasSku;
    public static function saveProuduct($request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_qty = $request->product_qty;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->save();
    }
}
