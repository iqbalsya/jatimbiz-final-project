<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
{
    public function index()
    {
        $merchants = Merchant::with('city')->get();
        return view('components.dashboard.merchants.index', compact('merchants'));
    }

    public function show(Merchant $merchant)
    {
        return view('components.dashboard.merchants.show', compact('merchant'));
    }

    public function create()
    {
        $cities = City::all();
        return view('components.dashboard.merchants.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email|max:255',
            'city_id' => 'required|exists:cities,id',
            'wa_number' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Nama merchant wajib diisi.',
            'email.required' => 'Email merchant wajib diisi.',
            'city_id.required' => 'Kota wajib dipilih.',
            'wa_number.required' => 'Nomor WA wajib diisi.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('merchants', 'public');
        }

        Merchant::create($validated);

        return redirect()->route('merchants.index')->with('success', 'Merchant telah ditambahkan.');
    }

    public function edit(Merchant $merchant)
    {
        $cities = City::all();
        return view('components.dashboard.merchants.edit', compact('merchant', 'cities'));
    }

    public function update(Request $request, Merchant $merchant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email|max:255',
            'city_id' => 'required|exists:cities,id',
            'wa_number' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Nama merchant wajib diisi.',
            'email.required' => 'Email merchant wajib diisi.',
            'city_id.required' => 'Kota wajib dipilih.',
            'wa_number.required' => 'Nomor WA wajib diisi.',
        ]);

        if ($request->hasFile('image')) {

            if ($merchant->image) {
                Storage::disk('public')->delete($merchant->image);
            }
            $validated['image'] = $request->file('image')->store('merchants', 'public');
        }

        $merchant->update($validated);

        return redirect()->route('merchants.index')->with('success', 'Data merchant telah diperbarui.');
    }

    public function destroy(Merchant $merchant)
    {
        if ($merchant->image) {
            Storage::disk('public')->delete($merchant->image);
        }
        $merchant->delete();
        return redirect()->route('merchants.index')->with('success', 'Data merchant telah dihapus.');
    }
}
