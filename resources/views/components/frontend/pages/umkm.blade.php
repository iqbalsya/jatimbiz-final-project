@extends('layouts.app')

@section('content')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">UMKM</h1>
</div>
<!-- Single Page Header End -->

<!-- Fruits Shop Start-->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">UMKM di Jawa Timur</h1>
            <p>Daftar UMKM yang ada di berbagai daerah di Jawa Timur.</p>
        </div>

        <div class="d-flex justify-content-end">
            <div class="bg-light ps-3 py-2 rounded d-flex justify-content-between mb-4">
                <form id="cityForm" method="GET" action="{{ route('umkm') }}">
                    <select id="city" name="city_id" class="border-0 form-select-sm bg-light me-3 " onchange="document.getElementById('cityForm').submit();">
                        <option value="">Semua kota</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ $selectedCity == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-4">
            @foreach($merchants as $merchant)
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                @if ($merchant->image)
                                    <img src="{{ asset('storage/' . $merchant->image) }}" class="img-fluid rounded-circle w-100" alt="{{ $merchant->name }}">
                                @else
                                    <img src="img/default-merchant.jpg" class="img-fluid rounded-circle w-100" alt="Default Image">
                                @endif
                            </div>
                            <div class="col-6">
                                <a href="{{ route('umkm.products', $merchant->id) }}" class="h4">{{ Str::limit($merchant->name, 16, '...') }}</a>
                                <h5 class="mb-3">{{ $merchant->city->name }}</h5>
                                <a href="{{ route('umkm.products', $merchant->id) }}" class="btn border border-secondary rounded-pill px-3 text-success"><i class="fa fa-shopping-bag me-2 text-success"></i> Lihat Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                <div class="pagination d-flex justify-content-center mt-5">
                    {{ $merchants->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->

<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection
