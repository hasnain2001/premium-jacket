<?php

namespace App\Http\Controllers;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index() {
        $genders = Gender::all();
        return view('admin.gender.index', compact('genders'));
    }

    public function create() {
        return view('admin.gender.create');
    }

    public function store(Request $request) {


        Gender::create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'title' => $request->title,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,


        ]);

        return redirect()->back()->with('success', 'Gender Created Successfully');
    }

    public function edit($id) {
        $genders = Gender::find($id);
        return view('admin.gender.edit', compact('genders'));
    }

    public function update(Request $request, $id) {
        $genders = Gender::find($id);

        $genders->update([
            'name'=> $request->name,
            'title' => $request->title,
            'slug'=> $request->slug,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,


        ]);

        return redirect()->back()->with('success', 'Genders Updated Successfully');
    }

    public function delete($id) {
        Gender::find($id)->delete();
        return redirect()->back()->with('success', 'Genders Deleted Successfully');
    }


public function deleteSelected(Request $request)
{
    $categoryIds = $request->input('selected_categories');

    if ($categoryIds) {
        Gender::whereIn('id', $categoryIds)->delete();
        return redirect()->back()->with('success', 'Selected categories deleted successfully');
    } else {
        return redirect()->back()->with('error', 'No categories selected for deletion');
    }
}

}
