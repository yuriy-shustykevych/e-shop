<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
       return view('frontend.index');
   }


   public function categories()
   {
       $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
   }

   public function products($category_slug)
   {
       $category = Category::where('slug', $category_slug)->first();

       if($category){
           $products = $category->products()->get();
           return view('frontend.collections.products.index', compact('products', 'category'));
       }
       else{
           return redirect()->back();
       }
   }

   public function productView(string $category_slug, string $product_slug)
   {
       $category = Category::where('slug', $category_slug)->first();

       if($category){
           $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();

           if($product){
               return view('frontend.collections.products.view', compact('product', 'category'));
           }
           else{
               return redirect()->back();
           }
       }
       else{
           return redirect()->back();
       }
   }

   public function thankYou()
   {
        return view('frontend.thank-you');
   }
}
