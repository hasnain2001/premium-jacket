<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Gender;
use Illuminate\Support\Str;



class ProductController extends Controller
{

    public function searchResults(Request $request)
    {

        $genders = Gender::all();
        $query = $request->input('query');
        $trimmedQuery = trim($query);
        $stores = Product::where('name', 'like', "%$trimmedQuery%")
                         ->orderBy('name')
                         ->get();
        $exactStore = Product::where('name', $trimmedQuery)->first();
        if ($exactStore) {
            return redirect()->route('admin.product.details', ['slug' => Str::slug($exactStore->name)]);
        }

        return view('admin.product.index', [
            'stores' => $stores,
            'query' => $query,
            'genders' => $genders,
        ]);
    }

    public function productdetail($slug){


        $product = Product::where('slug', $slug)->first();

        if (!$product) {

            abort(404);
        }

        return view('admin.product.product-detail', compact("product"));
    }
    public function product_blog() {

        $productsByCategory = Product::select('category', Product::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        return view('blog', compact('productsByCategory'));
    }

    public function index(Request $request)
    {
        $categories = Product::select('categories')->distinct()->get();
        $selectedCategory = $request->input('categories');
    
        // Build the product query and filter by category if selected
        $productsQuery = Product::query()->orderBy('created_at', 'desc');
        
        if ($selectedCategory) {
            $productsQuery->where('categories', $selectedCategory);
        }
        
        // Paginate the results
        $products = $productsQuery->paginate(12);
        
        return view('admin.product.index', compact('products', 'categories', 'selectedCategory'));
    }
    



    public function product_home() {
        $products = Product::all();

        return view('product', compact('products'));
    }

    public function create() {
        $categories = Categories::all();
        return view('admin.product.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'price' => 'required|numeric',
            'offprice' => 'required|numeric',
            'quantity' => 'required|integer',
            'categories' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'meta_tag' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'productimage' => 'required|array|max:6',
            'productimage.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $slug = Str::slug($request->name);

        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $images = [];
        if ($files = $request->file('productimage')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'uploads/product/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'offprice' => $request->offprice,
            'quantity' => $request->quantity,
            'categories' => $request->categories,
            'title' => $request->title,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => $request->authentication ?? "No Auth",
            'productimage' => json_encode($images),
        ]);

        return redirect()->back()->with('success', 'Product Created Successfully');
    }





    public function edit($id) {
        $product = Product::find($id);
        $categories = Categories::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'price' => 'required|numeric',
            'offprice' => 'required|numeric',
            'quantity' => 'required|integer',
            'categories' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'meta_tag' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'productimage.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        $product = Product::findOrFail($id);

        if ($request->name !== $product->name) {
            $slug = Str::slug($request->name);


            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $product->slug = $slug;
        }

        // Handle image uploads
        $images = json_decode($product->productimage, true) ?? [];

        if ($files = $request->file('productimage')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'uploads/product/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $images[] = $image_url;
            }
        }

        // Update the product details
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'offprice' => $request->offprice,
            'quantity' => $request->quantity,
            'categories' => $request->categories,
            'title' => $request->title,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => $request->authentication ?? "No Auth",
            'productimage' => json_encode($images),
        ]);

        return redirect()->back()->with('success', 'Product updated successfully');
    }




    public function destroy($id) {
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    public function deleteSelected(Request $request) {
        $productIds = $request->input('selected_products');

        if ($productIds) {
            // Debug: Check the product IDs to be deleted
            dd($productIds);

            // Delete only the products
            Product::whereIn('id', $productIds)->delete();

            return redirect()->back()->with('success', 'Selected products deleted successfully');
        } else {
            return redirect()->back()->with('error', 'No products selected for deletion');
        }
    }


}
