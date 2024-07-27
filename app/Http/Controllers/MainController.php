<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Categories;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Gender;

class MainController extends Controller
{
    public function index(){
        $categories = Categories::all();
        
        $products =Product:: all();
        $blogs = Blog::all();

        return view('main',compact("categories","products","blogs"));
    }
  
    public function product(){
        $products = Product::paginate(20);
        
        return view("product",compact("products",));
    }
    public function productdetail($slug){
       
       
        $product = Product::where('slug', $slug)->first();
    
        if (!$product) {
         
            abort(404); 
        }
    
        return view("product_detail", compact("product"));
    }
    
    
    public function blog_home()
    {
          $blogs = Blog::paginate(5);
          $genders =Gender::all();
    $chunks = Product::latest()->limit(25)->get();

        return view('blog', compact('blogs', 'chunks','genders'));
    }
    
public function blog_show($title) {

    $decodedTitle = str_replace('-', ' ', $title);
    $blog = Blog::where('title', $decodedTitle)->firstOrFail();
     $chunks = Product::latest()->limit(25)->get();
     $genders =Gender::all();
    return view('blog_details', compact('blog','chunks','genders'));
}
   public function  categories(){
    $categories = Categories::latest()->get();
    $genders =Gender::all();
    return view('categories', compact('categories','genders'));
   }
   
   public function viewcategory($title)
{

    $genders =Gender::all();

    $slug = Str::slug($title);
    

    $name = ucwords(str_replace('-', ' ', $slug));
    

    $products = Product::where('categories', $name)->get();
        $categories = Categories::all();
       


    $storeCount = $products->count();


    
    return view('categories_details', compact('products', 'name', 'categories', 'storeCount','genders'));
}

public function gender(){
    $genders = Gender::latest()->get();
    
    return view('gender', compact('genders'));
   }
public function viewgender($title)
{

    $slug = Str::slug($title);
    

    $name = ucwords(str_replace('-', ' ', $slug));
    

    $categories = Categories::where('gender', $name)->get();
        $genders = Gender::all();


    $storeCount = $categories->count();

    
    return view('gender_details', compact('categories', 'name', 'genders', 'storeCount'));
}

public function thankyou(){

    return view('thankyou');

}


}
