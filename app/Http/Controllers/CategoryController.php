<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public function one()
    {
        $categories = Category::all();
        return view('product-view.index', compact('categories'));
    }
}
