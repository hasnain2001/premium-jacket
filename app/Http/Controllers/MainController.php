<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Categories;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Gender;

class MainController extends Controller
{


    public function notfound()
    {

 return view('404', );
    }

public function about()
{
return view('about' );
}
 public function feature(){
    $products = Product::where('top_product', '>',0)->get();
    return view('featured_product',compact('products'));
 }
    public function index()
    { 
    $products  = Product::where('categories', 'men fur and shearling leather jackets')->limit(4)->get();
    $products2 = Product::where('categories', 'women fur and shearling leather jackets')->limit(4)->get();
    $products3 = Product::where('categories', 'men fur and shearling coats')->limit(4)->get();
    $products4 = Product::where('categories', 'men aviator jackets')->limit(4)->get();
    $products5 = Product::where('categories', 'men biker jackets')->limit(4)->get();
    $products6 = Product::where('top_product', '>',0)->limit(4)->get();
    $blogs = Blog::paginate(12);

    return view('main', compact( 'products','blogs','products2','products3','products4','products5','products6')

    );}




    public function product(){
        $products = Product::paginate(20);
      
        return view("product",compact('products', ));
    }
public function productdetail($slug)
{
$product = Product::where('slug', $slug)->first();
if (!$product) {
return redirect('404');
}
$relatedproduct = Product::where('categories', $product->categories)
->where('id', '!=', $product->id)
->get();
return view('product_detail', compact('product','relatedproduct'));
}


    public function blog_home()
    {
          $blogs = Blog::paginate(5);
     
    
    $chunks = Product::latest()->limit(24)->get();

        return view('blog', compact('blogs', 'chunks',));
    }

public function blog_show($title) {

    $decodedTitle = str_replace('-', ' ', $title);
    $blog = Blog::where('title', $decodedTitle)->firstOrFail();
    
  
    return view('blog_details', compact('blog',));
}
   public function  categories(){
    $categories = Categories::latest()->get();
  
    return view('categories', compact('categories',));
   }



   public function viewcategory($name) {
 
    $slug = Str::slug($name);
    $title = ucwords(str_replace('-', ' ', $slug));

    // Fetch the category
    $category = Categories::where('slug', $title)->first();
   
    if (!$category) {
        return redirect('404');
    }

    // Fetch related products
    $products = Product::where('categories', $title)->get();

    return view('categories_details', compact('category', 'products',));
}

public function gender(){
    $genders = Gender::latest()->get();
  
    return view('gender', compact('genders',));
   }
public function viewgender($title)
{
    $slug = Str::slug($title);
    $name = ucwords(str_replace('-', ' ', $slug));
    $categories = Categories::where('gender', $name)->get();

  
    $storeCount = $categories->count();


    return view('gender_details', compact('categories', 'name',  'storeCount',));
}

public function thankyou(){

    return view('thankyou');

}


}
