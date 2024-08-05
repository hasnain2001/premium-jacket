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
        $stores = Product::where('name', 'like', "%$trimmedQuery%")
                         ->orderBy('name')
                         ->get();
        $exactStore = Product::where('name', $trimmedQuery)->first();
        if ($exactStore) {
            return redirect()->route('product_details', ['slug' => Str::slug($exactStore->name)]);
        }
        return view('search_results', [
            'stores' => $stores,
            'query' => $query,
            'genders' => $genders,
        ]);
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
