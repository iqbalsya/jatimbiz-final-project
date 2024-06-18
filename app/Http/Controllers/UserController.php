<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data user

        return view('components.dashboard.user-management.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID

        return view('components.dashboard.user-management.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user', // Sesuaikan dengan role yang ada di aplikasi Anda
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Mengambil data user berdasarkan ID
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
