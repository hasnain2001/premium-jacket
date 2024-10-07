<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.customer.index',compact('users'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user or fail
        $user->delete(); // Delete the user

        return redirect()->route('customer')->with('success', 'User deleted successfully.'); // Redirect back with a success message
    }
}
