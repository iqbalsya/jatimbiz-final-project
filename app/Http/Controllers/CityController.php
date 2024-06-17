<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('components.dashboard.cities.index', compact('cities'));
    }


    public function create()
    {
        $city = new City();
        return view('components.dashboard.cities.create', compact('city'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kota wajib diisi.',
        ]);

        City::create($validated);

        return redirect()->route('cities.index')->with('success', 'Kota telah ditambahkan.');
    }


    public function edit(City $city)
    {
        return view('components.dashboard.cities.edit', compact('city'));
    }


    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kota wajib diisi.',
        ]);

        $city->update($validated);

        return redirect()->route('cities.index')->with('success', 'Data kota telah diperbarui');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('success', 'Data kota telah dihapus.');
    }
}
