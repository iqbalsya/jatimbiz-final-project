@extends('layouts.app')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Produk UMKM Jawa Timur</h1>
</div>
<!-- Single Page Header End -->

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4 mb-2">
                    <div class="col-xl-9">
                        <h1 class="">List Produk</h1>
                    </div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label class="pt-1" for="city">Cari di:</label>
                            <form id="cityForm" method="GET" action="{{ isset($category) ? route('products.category', $category->id) : route('products') }}">
                                <select id="city" name="city_id" class="border-0 form-select-sm bg-light me-3" onchange="document.getElementById('cityForm').submit();">
                                    <option value="">Semua Kota</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $selectedCity == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Kategori</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="{{ route('products') }}"><i class="fas fa-circle me-2 text-success"></i>Semua</a>
                                                <span>({{ $totalProduct }})</span>
                                            </div>
                                        </li>
                                        @foreach($categories as $categoryItem)
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="{{ route('products.category', $categoryItem->id) }}"><i class="fas fa-circle me-2 text-success"></i>{{ $categoryItem->name }}</a>
                                                    <span>({{ $categoryItem->products->count() }})</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="{{ asset('storage/' . $product->image1) }}" class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->category->name }}</div>
                                        <div class="p-4 border border-success border-top-0 rounded-bottom">
                                            <h4>{{ $product->name }}</h4>
                                            <p>{{ Str::limit($product->description, 40, '...') }}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0 pt-1">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn border border-secondary rounded-pill px-3 text-success">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection
