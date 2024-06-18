@extends('layouts.app')

@section('content')

    <!-- Single Page Header Start -->
    <div class="container-fluid page-header py-5" style="background-image: url('{{ asset('assets/img/jatim.jpg') }}'); background-size: cover; background-position: center;">
        <h1 class="text-center text-white display-6">Detail Produk</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item active text-white">{{ $product->name }}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Single Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="card-body p-3">
                                <div id="productImages" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner text-center">
                                        @if ($product->image1)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $product->image1) }}" class="d-block mx-auto w-100" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                        @if ($product->image2)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $product->image2) }}" class="d-block mx-auto" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                        @if ($product->image3)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $product->image3) }}" class="d-block mx-auto" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                        @if ($product->image4)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $product->image4) }}" class="d-block mx-auto" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                        @if ($product->image5)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $product->image5) }}" class="d-block mx-auto" alt="{{ $product->name }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    @if ($product->image1)
                                        <img src="{{ asset('storage/' . $product->image1) }}" class="img-thumbnail mx-1" width="80" onclick="changeImage('{{ asset('storage/' . $product->image1) }}')">
                                    @endif
                                    @if ($product->image2)
                                        <img src="{{ asset('storage/' . $product->image2) }}" class="img-thumbnail mx-1" width="80" onclick="changeImage('{{ asset('storage/' . $product->image2) }}')">
                                    @endif
                                    @if ($product->image3)
                                        <img src="{{ asset('storage/' . $product->image3) }}" class="img-thumbnail mx-1" width="80" onclick="changeImage('{{ asset('storage/' . $product->image3) }}')">
                                    @endif
                                    @if ($product->image4)
                                        <img src="{{ asset('storage/' . $product->image4) }}" class="img-thumbnail mx-1" width="80" onclick="changeImage('{{ asset('storage/' . $product->image4) }}')">
                                    @endif
                                    @if ($product->image5)
                                        <img src="{{ asset('storage/' . $product->image5) }}" class="img-thumbnail mx-1" width="80" onclick="changeImage('{{ asset('storage/' . $product->image5) }}')">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mt-3">{{ $product->name }}</h4>
                            <p class="mt-n1">Category: {{ $product->category->name }}</p>
                            <h5 class="fw-bold mt-4 mb-3">Harga: Rp. {{ number_format($product->price, 0, ',', '.') }}</h5>
                            <p class="mb-3">Berat: {{ $product->weight }} gr</p>
                            <p class="mb-4">Kondisi: {{ $product->condition }}</p>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-1">
                                    <button class="nav-link active border-white border-bottom-0 text-success" type="button" role="tab" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" aria-controls="nav-description" aria-selected="true">Deskripsi</button>
                                    <button class="nav-link border-white border-bottom-0 text-success" type="button" role="tab" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" aria-controls="nav-reviews" aria-selected="false">Ulasan</button>
                                    <button class="nav-link border-white border-bottom-0 text-success" type="button" role="tab" id="nav-purchase-links-tab" data-bs-toggle="tab" data-bs-target="#nav-purchase-links" aria-controls="nav-purchase-links" aria-selected="false">Link Pembelian</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-3">
                                <div class="tab-pane active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                    <p class="mt-3">{{ $product->description }}</p>
                                </div>
                                <div class="tab-pane" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                    @foreach($product->reviews as $review)
                                        <div class="d-flex mt-1 mb-4 mt-4">
                                            <img src="{{ asset('assets/img/avatar.png') }}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">{{ $review->created_at->format('M d, Y') }}</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>{{ $review->user->name }}</h5>
                                                </div>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <form action="{{ route('products.reviews.submit', $product->id) }}" method="POST">
                                        @csrf
                                        <h4 class="mb-3 fw-bold">Berikan Ulasan</h4>
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="border-bottom rounded my-4">
                                                    <textarea name="review" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end py-3 mb-5">
                                                    <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="nav-purchase-links" role="tabpanel" aria-labelledby="nav-purchase-links-tab">
                                    <div class="px-3">
                                        <h5 class="mt-4">Link Pembelian</h5>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="">
                                            @if ($product->purchase_link_shopee)
                                                <a href="{{ $product->purchase_link_shopee }}" class="btn btn-success m-1" target="_blank">Shopee</a>
                                            @endif
                                            @if ($product->purchase_link_tokopedia)
                                                <a href="{{ $product->purchase_link_tokopedia }}" class="btn btn-success m-1" target="_blank">Tokopedia</a>
                                            @endif
                                            @if ($product->purchase_link_lazada)
                                                <a href="{{ $product->purchase_link_lazada }}" class="btn btn-success m-1" target="_blank">Lazada</a>
                                            @endif
                                            @if ($product->purchase_link_tiktokshop)
                                                <a href="{{ $product->purchase_link_tiktokshop }}" class="btn btn-success m-1" target="_blank">Tiktokshop</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <h4 class="mb-4">Produk Serupa</h4>
                            @foreach($relatedProducts as $relatedProduct)
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded" style="width: 100px; height: 100px;">
                                        <a href="{{ route('product.detail', $relatedProduct->id) }}">
                                            <img src="{{ asset('storage/' . $relatedProduct->image1) }}" class="img-fluid rounded" alt="{{ $relatedProduct->name }}">
                                        </a>
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="">{{ $relatedProduct->name }}</h6>
                                        <div class="d-flex mb-4">
                                            <h6 class="fw-bold me-2">Rp. {{ number_format($relatedProduct->price, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- UMKM Products Start -->
            <div class="row g-4 mt-5">
                <h4>Produk Lainnya Milik {{ $product->merchant->name }}</h4>
                @foreach($umkmProducts as $umkmProduct)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="border rounded p-3">
                            <a href="{{ route('product.detail', $umkmProduct->id) }}">
                                <img src="{{ asset('storage/' . $umkmProduct->image1) }}" class="img-fluid rounded mb-3" alt="{{ $umkmProduct->name }}">
                                <h5 class="fw-bold">{{ $umkmProduct->name }}</h5>
                                <p>Rp. {{ number_format($umkmProduct->price, 0, ',', '.') }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- UMKM Products End -->
        </div>
    </div>

    <script>
        function changeImage(src) {
            let activeItem = document.querySelector('.carousel-item.active img');
            activeItem.src = src;
        }
    </script>

@endsection
