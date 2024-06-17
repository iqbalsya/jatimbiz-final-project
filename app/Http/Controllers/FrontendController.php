<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function home()
    {
        $products = Product::with('category', 'merchant')->get();

        return view('components.frontend.pages.home', compact('products'));
    }


    public function umkm()
    {
        $totalProduct = Product::count();
        $categories = Category::all();

        $products = Product::with('category', 'merchant')->paginate(6);

        return view('components.frontend.pages.umkm', compact('categories', 'products', 'totalProduct'));
    }


    public function products()
    {

        $totalProduct = Product::count();
        $categories = Category::all();

        $products = Product::with('category', 'merchant')->paginate(6);
        return view('components.frontend.pages.products', compact('categories', 'products', 'totalProduct'));
    }

    public function category(Category $category)
    {
        $totalProduct = Product::count();
        $categories = Category::all();
        $products = Product::where('category_id', $category->id)->with('category')->paginate(10);

        return view('components.frontend.pages.products', compact('categories', 'products', 'totalProduct'));
    }

    public function productDetail($id)
    {
        // Ambil data produk berdasarkan ID
        // $product = Product::findOrFail($id);

        // Untuk sekarang kita kirimkan ID saja ke view
        return view('components.frontend.pages.product-detail', compact('id'));
    }

    public function contact()
    {
        return view('components.frontend.pages.contact');
    }
}
