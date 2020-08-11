<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function productsList(Category $category)
    {
//        foreach(request()->all() as $result) {
//            echo $result , '<br>';
//        }

        if (request()->ajax()){
            return $category->products;
        }

        $products = Product::paginate();
        $categories = Category::all();
        return view('front.products_list',compact('products','categories'));

    }


    public function search()
    {
      return Product::whenSearch(request()->search)->get();
    }


    public function show(Product $product)
    {
        return view('front.single_product',compact('product'));
    }
}
