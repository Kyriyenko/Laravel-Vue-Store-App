<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{

    public function deleteSubCategory(Request $request)
    {
        SubCategory::find($request->sub_category_id)->delete();

        $result = [
            'status' => true,
            'message' => 'sub_category deleted',
        ];

        return $result;
    }

    public function createSubCategory(Request $request)
    {
        $sub_category = new  SubCategory([
            'title' => $request->title,
            'category_id' => $request->category_id,
        ]);

        $sub_category->save();

        return [
            'status' => true,
            'message' => 'sub_category created',
        ];
    }

    public function getAllCategories()
    {
        $categories = DB::table('categories')
            ->Join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
            ->select('sub_categories.id', 'sub_categories.title as category', 'categories.title as collection')
            ->get();

        return $categories;
    }
}
