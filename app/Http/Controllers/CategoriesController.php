<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function category() {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create_category() {
        return view('admin.categories.create');
    }

    public function store_category(Request $request) {
  
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'meta_tag' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'status' => 'required|boolean',
            'authentication' => 'nullable|string',
         
        ]);
    



        Categories::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => $request->filled('authentication') ? $request->authentication : "No Auth",

        ]);
    
        return redirect()->back()->with('success', 'Category Created Successfully');
    }
    
    
    public function edit_category($id) {
        $categories = Categories::find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function update_category(Request $request, $id) {
        $categories = Categories::find($id);

        

        $categories->update([
            'title' => $request->title,
            'slug'=> $request->slug,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? $request->authentication : "No Auth",

        ]);

        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function delete_category($id) {
        Categories::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
    
    
public function deleteSelected(Request $request)
{
    $categoryIds = $request->input('selected_categories');

    if ($categoryIds) {
        Categories::whereIn('id', $categoryIds)->delete();
        return redirect()->back()->with('success', 'Selected categories deleted successfully');
    } else {
        return redirect()->back()->with('error', 'No categories selected for deletion');
    }
}



}
