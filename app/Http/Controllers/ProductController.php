<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;
use DB;


class ProductController extends Controller
{
    public function index(){
      return view('pages.index', [
        'title' => 'Home'
        ]);
    }
    
    public function product(){
      $product = Product::select('*')
      ->get();
      
      $category = Category::select('*')
      ->get();
      
      return view('partials.products', [
       'products' => $product,
       'title' => 'Product',
       'categories' => $category
        ]);
    }
    
    public function detail($name, $id){
      $newName = str_replace('-', ' ', $name);
      $product = Product::select('*')
      ->where('id', $id)
      ->where('name', $newName)
      ->get();
      
      $join = DB::table('product')
      ->join('categories','categories.id','=','product.categories')
      ->where('product.id', $id)
      ->get();
      
      $review = Review::select('*')
      ->where('id_product', $id)
      ->get();
      
      $products = Product::select('*')
      ->get();
      
      $rand = Product::select('*')
      ->inRandomOrder()
      ->skip(0)
      ->take(6)
      ->get();
      
      return view('pages.product',[
        'title' => $newName,
        'product' => $product,
        'review' => $review,
        'join' => $join,
        'products' => $products,
        'random' => $rand
      ]);
    }
    
    public function category($categorye, $id){
     $categories = Product::select('*')
     ->where('categories', $id)
     ->get();
     
     $category = Category::select('*')
      ->get();
      
      return view('pages.category', [
        'title' => $categorye,
       'products' => $categories,
       'categories' => $category,
       'idCategories' => $id
      ]);
    }
    
    public function dumpBasket(){
      
    }
}
