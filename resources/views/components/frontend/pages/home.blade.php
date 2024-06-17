@extends('layouts.app')

@section('content')
    @include('components.frontend.sections.hero')
    @include('components.frontend.sections.features')

    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Produk Pilihan Kami</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach($products as $product)
                    <div class="border border-success rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('storage/' . $product->image1) }}" class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                        </div>
                        <div class="text-white bg-success px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{ $product->category->name }}</div>
                        <div class="p-4 rounded-bottom">
                            <h4>{{ $product->name }}</h4>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0 pt-1">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-success">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
