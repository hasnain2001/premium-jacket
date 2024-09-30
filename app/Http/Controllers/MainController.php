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
        $genders = Gender::all();
        $products = Product::latest()->take(25)->get();
        $blogs = Blog::paginate(10);

        // Fetch categories based on the gender column in the categories table
        $categoriesByGender = [];
        foreach ($genders as $gender) {
            $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
        }

 return view('404', ['products' => $products, 'blogs' => $blogs, 'genders' => $genders,'categoriesByGender' => $categoriesByGender
        ]);
    }

    public function about()
    {
        $genders = Gender::all();
        $products = Product::latest()->take(25)->get();
        $blogs = Blog::paginate(10);

        // Fetch categories based on the gender column in the categories table
        $categoriesByGender = [];
        foreach ($genders as $gender) {
            $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
        }

        return view('about', [
            'products' => $products,
            'blogs' => $blogs,
            'genders' => $genders,
            'categoriesByGender' => $categoriesByGender
        ]);
    }
    public function index()
    {
        $genders = Gender::all();
        $products = Product::latest()->take(25)->get();
        $blogs = Blog::paginate(10);

        // Fetch categories based on the gender column in the categories table
        $categoriesByGender = [];
        foreach ($genders as $gender) {
            $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
        }

        return view('main', [
            'products' => $products,
            'blogs' => $blogs,
            'genders' => $genders,
            'categoriesByGender' => $categoriesByGender
        ]);
    }




    public function product(){
        $products = Product::paginate(20);
        $genders = Gender::all();
          // Fetch categories based on the gender column in the categories table
          $categoriesByGender = [];
          foreach ($genders as $gender) {
              $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
          }

        return view("product",compact('products','genders','categoriesByGender' ));
    }
    public function productdetail($slug)
    {

        $genders = Gender::all();
        $categoriesByGender = [];
        foreach ($genders as $gender) {
            $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
        }

        $product = Product::where('slug', $slug)->first();


        if (!$product) {
            return redirect('404');
        }


        return view('product_detail', [
            'product' => $product,
            'genders' => $genders,
           'categoriesByGender' => $categoriesByGender
        ]);
    }


    public function blog_home()
    {
          $blogs = Blog::paginate(5);
          $genders =Gender::all();
          $genders = Gender::all();
          $categoriesByGender = [];
    foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }
    $chunks = Product::latest()->limit(25)->get();

        return view('blog', compact('blogs', 'chunks','genders','categoriesByGender'));
    }

public function blog_show($title) {

    $decodedTitle = str_replace('-', ' ', $title);
    $blog = Blog::where('title', $decodedTitle)->firstOrFail();
     $chunks = Product::latest()->limit(25)->get();
     $genders =Gender::all();
     foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }
    return view('blog_details', compact('blog','chunks','genders','categoriesByGender'));
}
   public function  categories(){
    $categories = Categories::latest()->get();
    $genders =Gender::all();
    foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }
    return view('categories', compact('categories','genders','categoriesByGender'));
   }



   public function viewcategory($name) {
    $slug = Str::slug($name);
    $title = ucwords(str_replace('-', ' ', $slug));

    // Fetch the category
    $category = Categories::where('slug', $title)->first();
    $genders =Gender::all();
    foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }
    if (!$category) {
        return redirect('404');
    }

    // Fetch related products
    $products = Product::where('categories', $title)->get();

    return view('categories_details', compact('category', 'products','genders','categoriesByGender'));
}

public function gender(){
    $genders = Gender::latest()->get();
    foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }
    return view('gender', compact('genders','categoriesByGender'));
   }
public function viewgender($title)
{
    $slug = Str::slug($title);
    $name = ucwords(str_replace('-', ' ', $slug));
    $categories = Categories::where('gender', $name)->get();
    $genders = Gender::all();
    foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }
    $storeCount = $categories->count();


    return view('gender_details', compact('categories', 'name', 'genders', 'storeCount','categoriesByGender'));
}

public function thankyou(){

    return view('thankyou');

}


}
