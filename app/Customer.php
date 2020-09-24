<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use BinaryCats\Sku\HasSku;

class Customer extends Model
{
    use HasSku;
    public static function saveCustomer($request)
    {
        $image = $request->file('image');
        $imageName= time().'.'.$image->getClientOriginalName();
        $image->move(public_path('upload'),$imageName);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->sku = $request->sku;
        $customer->customer_email = $request->customer_email;
        $customer->customer_mobile = $request->customer_mobile;
        $customer->image = 'upload/'.$imageName;
        $customer->save();
    }
}
