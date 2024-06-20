<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\Merchant;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $products = Product::with('category', 'merchant')->get();

        return view('components.frontend.pages.home', compact('products'));
    }


    public function umkm(Request $request)
    {
        $selectedCity = $request->get('city_id'); // Get the selected city ID from the request

        if ($selectedCity) {
            $merchants = Merchant::with('products', 'city')
                ->where('city_id', $selectedCity)
                ->paginate(6);
        } else {
            $merchants = Merchant::with('products', 'city')->paginate(9);
        }

        $cities = City::all();
        $totalProduct = Product::count();

        return view('components.frontend.pages.umkm', compact('cities', 'merchants', 'totalProduct', 'selectedCity'));
    }


    public function umkmProducts($id)
    {
        $merchant = Merchant::with('products.category')->findOrFail($id);
        $categories = Category::all();
        $totalProduct = $merchant->products->count();

        return view('components.frontend.pages.umkm-products', compact('categories', 'merchant', 'totalProduct'));
    }


    public function products(Request $request, Category $category = null)
    {
        $selectedCity = $request->get('city_id'); // Get the selected city ID from the request

        if ($selectedCity) {
            $products = Product::with('category', 'merchant')
                ->whereHas('merchant', function ($query) use ($selectedCity) {
                    $query->where('city_id', $selectedCity);
                })
                ->paginate(6);
        } else {
            $products = Product::with('category', 'merchant')->paginate(9);
        }

        $categories = Category::all();
        $cities = City::all();
        $totalProduct = Product::count();

        return view('components.frontend.pages.products', compact('categories', 'products', 'totalProduct', 'cities', 'selectedCity', 'category'));
    }



    public function category(Request $request, Category $category)
    {
        $selectedCity = $request->get('city_id'); // Get the selected city ID from the request

        if ($selectedCity) {
            $products = Product::where('category_id', $category->id)
                ->whereHas('merchant', function ($query) use ($selectedCity) {
                    $query->where('city_id', $selectedCity);
                })
                ->with('category')
                ->paginate(10);
        } else {
            $products = Product::where('category_id', $category->id)
                ->with('category')
                ->paginate(10);
        }

        $categories = Category::all();
        $cities = City::all(); // Get all cities for the filter dropdown
        $totalProduct = Product::count();

        return view('components.frontend.pages.products', compact('categories', 'products', 'totalProduct', 'cities', 'selectedCity', 'category'));
    }




    public function productDetail($id)
    {
        $product = Product::with('category', 'merchant')->findOrFail($id);

        // Produk Serupa
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->limit(4)
                                ->get();

        // Produk dari UMKM yang Sama
        $umkmProducts = Product::where('merchant_id', $product->merchant_id)
                            ->where('id', '!=', $product->id)
                            ->limit(4)
                            ->get();

        return view('components.frontend.pages.product-detail', compact('product', 'relatedProducts', 'umkmProducts'));
    }


    public function submitReview(Request $request, $productId)
    {

        $request->validate([
            'review' => 'required|string|max:500',
        ]);

        $product = Product::findOrFail($productId);

        $review = new Review();
        $review->user_id = auth()->id();
        $review->product_id = $product->id;
        $review->review = $request->review;
        $review->save();

        return redirect()->route('product.detail', $product->id)->with('success', 'Review submitted successfully');
    }


    public function contact()
    {
        return view('components.frontend.pages.contact');
    }
}
