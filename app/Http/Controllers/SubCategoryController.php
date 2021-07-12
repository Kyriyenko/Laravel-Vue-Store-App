<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function getAllCategories(){
        $categories = DB::table('categories')
            ->Join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
            ->select('sub_categories.id','sub_categories.title as category', 'categories.title as collection')
            ->get();

        return $categories;
    }
}
