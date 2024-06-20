@extends('layouts.app')

@section('content')
    @include('components.frontend.sections.hero')
    @include('components.frontend.sections.features')

    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0">Produk Pilihan Kami</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach($products as $product)
                    <div class="card border border-success rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('storage/' . $product->image1) }}" class="card-img-top rounded-top" alt="{{ $product->name }}">
                        </div>
                        <div class="text-white bg-success px-3 py-1 rounded-top position-absolute" style="top: 10px; right: 10px;">{{ $product->category->name }}</div>
                        <div class="card-body">
                            <h4>{{ Str::limit($product->name, 16, '...') }}</h4>
                            <p class="card-text text-dark fs-5 fw-bold mb-0">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn btn-success mt-2">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .vesitable-item {
            height: auto;
        }

        .vesitable-img {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .vesitable-img img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
        }
    </style>
@endsection
