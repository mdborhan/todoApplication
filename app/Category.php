<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    public static function saveCategoryName($request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->status = $request->status;
        $category->save();
    }
}
