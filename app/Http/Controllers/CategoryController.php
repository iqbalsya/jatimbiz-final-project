<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('components.dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('components.dashboard.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Kategori telah ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('components.dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Data kategori telah diperbarui');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Data kategori telah dihapus.');
    }
}
