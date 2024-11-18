<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gender;

class SearchController extends Controller
{
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product_detail', ['product' => $product]);
    }

    public function searchResults(Request $request)
    {
        $genders = Gender::all();
        $query = $request->input('query');
        $trimmedQuery = trim($query);
    
        // Paginate the results by 8 items per page (you can adjust as needed)
        $products = Product::where('name', 'like', "%$trimmedQuery%")
                           ->orderBy('name')
                           ->get();
    
        // Check for an exact match
        $exactStore = Product::where('name', $trimmedQuery)->first();
        
        if ($exactStore) {
            return redirect()->route('product_details', ['slug' => Str::slug($exactStore->name)]);
        }
    
        // Pass the query parameter to pagination
        return view('search_results', compact('products', 'query', 'genders'));
    }
    
    


    public function autocomplete(Request $request)
    {
        $query = $request->input('query');
        $trimmedQuery = trim($query);

        $stores = Product::where('name', 'like', "%$trimmedQuery%")
                         ->limit(20)
                         ->get(['name as title']);

        return response()->json($stores);
    }


public function searchSuggestions(Request $request)
{
    $query = $request->input('query');
    $relatedSearches = Product::where('name', 'like', $query . '%')->pluck('name')->toArray();
    return response()->json(['relatedSearches' => $relatedSearches]);
}

}
