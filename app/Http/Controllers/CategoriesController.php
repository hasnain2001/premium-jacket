<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Gender;
use App\Models\Product;

class CategoriesController extends Controller
{
    public function category() {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create_category() {
        $genders = Gender::all();
        return view('admin.categories.create',compact('genders'));
    }

    public function store_category(Request $request) {


        Categories::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'gender'=> $request->gender,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,

            'authentication' => isset($request->authentication) ? $request->authentication : "No Auth",

        ]);

        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function edit_category($id) {
        $categories = Categories::find($id);
        $genders=Gender::all();
        return view('admin.categories.edit', compact('categories','genders'));
    }

    public function update_category(Request $request, $id) {
        $categories = Categories::find($id);



        $categories->update([
            'title' => $request->title,
            'slug'=> $request->slug,
            'meta_tag' => $request->meta_tag,
            'gender'=> $request->gender,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
         
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
