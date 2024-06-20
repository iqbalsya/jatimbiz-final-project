@extends('layouts.app')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5" style="background-image: url('{{ asset('assets/img/jatim.jpg') }}'); background-size: cover; background-position: center;">
    <h1 class="text-center text-white display-6">Detail UMKM</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-white">{{ $merchant->name }}</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h4 class="display-6">Produk dari {{ $merchant->name }}</h4>
            <p>Daftar produk yang dijual oleh UMKM {{ $merchant->name }} di {{ $merchant->city->name }}.</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($merchant->products as $product)
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                            <img src="{{ asset('storage/' . $product->image1) }}" class="img-fluid w-100 rounded-top" alt="{{ $product->name }}">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->category->name }}</div>
                        <div class="p-4 border border-success border-top-0 rounded-bottom">
                            <h4>{{ Str::limit($product->name, 28, '...') }}</h4>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0 pt-1">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn border border-secondary rounded-pill px-3 text-success">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection

<style>
    .fruite-item {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .fruite-img {
        height: 250px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fruite-img img {
        height: 100%;
        width: auto;
        object-fit: cover;
    }

    .fruite-item .p-4 {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .fruite-item h4 {
        height: 3em;
        overflow: hidden;
    }

    .fruite-item p {
        flex-grow: 1;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
