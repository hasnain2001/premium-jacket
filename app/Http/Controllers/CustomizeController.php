<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customize;
use App\Models\Categories;
class CustomizeController extends Controller
{
    public function index()
    {
        // Retrieve only the required columns
        $customizes = Customize::select('name', 'email', 'phone_number', 'image', 'id', 'created_at','updated_at')->orderBy('created_at', 'desc')->get();
    
        // Return view with the data
        return view('admin.customize.index', compact('customizes'));
    }
    
public function orderDetail($id)
{
    // Find the customize data by its ID
    $customize = Customize::findOrFail($id);

    // Pass the customize data to the view
    return view('admin.customize.order-detail', compact('customize'));
}


    public function create (){
        $categories = Categories::all();
        return view('customize',compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'categories' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'color' => 'required|string|max:7', 
            'company' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1',
            'country' => 'required|string|max:100',
            'gender' => 'required|in:Male,Female',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust max size as needed
            'chest_size' => 'required|in:S,M,L,XL',
            'front_length' => 'required|in:S,M,L,XL',
            'shoulder_length' => 'required|in:S,M,L,XL',
            'waist_size' => 'required|in:S,M,L,XL',
            'sleeve_length' => 'required|in:S,M,L,XL',
            'bottom_size' => 'required|in:S,M,L,XL',
            'description' => 'nullable|string'
        ]);
    
        // Handle file upload if it exists
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/design/';
    
            // Save the file to the specified directory
            $file->move(public_path($filePath), $image);
        } else {
            // Set a default value if no image is uploaded
            $image = 'No Image';
        }
    
        // Create and save the new form data
        Customize::create([
            'name' => $request->name,
            'categories' => $request->categories,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'color' => $request->color,
            'company' => $request->company,
            'quantity' => $request->quantity,
            'country' => $request->country,
            'gender' => $request->gender,
            'image' => $image,
            'chest_size' => $request->chest_size,
            'front_length' => $request->front_length,
            'shoulder_length' => $request->shoulder_length,
            'waist_size' => $request->waist_size,
            'sleeve_length' => $request->sleeve_length,
            'bottom_size' => $request->bottom_size,
            'description' => $request->description,
        ]);
    
        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
    
    public function delete($id) {
        Customize::find($id)->delete();
        return redirect()->back()->with('success', 'Customize Deleted Successfully');
    }

    public function bulkDelete(Request $request)
    {
        $selectedBlogs = $request->input('selected_blogs');

        if ($selectedBlogs) {
            Customize::whereIn('id', $selectedBlogs)->delete();
            return redirect()->back()->with('success', 'Selected custom entries deleted successfully.');
        }

       return redirect()->back()->with('error', 'No blog entries selected for deletion.');
    }

}
