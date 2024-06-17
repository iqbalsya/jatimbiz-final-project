<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'merchant')->get();
        return view('components.dashboard.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('components.dashboard.products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $merchants = Merchant::all();
        return view('components.dashboard.products.create', compact('categories', 'merchants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'purchase_link_shopee' => 'nullable|url',
            'purchase_link_tokopedia' => 'nullable|url',
            'purchase_link_lazada' => 'nullable|url',
            'purchase_link_tiktokshop' => 'nullable|url',
        ], [
            'merchant_id.required' => 'Merchant wajib dipilih.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
        ]);

        $images = [];

        for ($i = 1; $i <= 5; $i++) {
            $imageKey = 'image' . $i;
            if ($request->hasFile($imageKey)) {
                $imagePath = $request->file($imageKey)->store('products', 'public');
                $images[$imageKey] = $imagePath;
            }
        }

        $validated = array_merge($validated, $images);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk telah ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $merchants = Merchant::all();
        return view('components.dashboard.products.edit', compact('product', 'categories', 'merchants'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'purchase_link_shopee' => 'nullable|url',
            'purchase_link_tokopedia' => 'nullable|url',
            'purchase_link_lazada' => 'nullable|url',
            'purchase_link_tiktokshop' => 'nullable|url',
        ], [
            'merchant_id.required' => 'Merchant wajib dipilih.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
        ]);

        $images = [];

        for ($i = 1; $i <= 5; $i++) {
            $imageKey = 'image' . $i;
            if ($request->hasFile($imageKey)) {
                $imagePath = $request->file($imageKey)->store('products', 'public');
                $images[$imageKey] = $imagePath;
            }
        }

        $validated = array_merge($validated, $images);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Data produk telah diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Data produk telah dihapus.');
    }
}
