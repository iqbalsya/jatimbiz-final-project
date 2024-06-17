<x-dashboard.layout bodyClass="g-sidenav-show bg-gray-200">
    <x-dashboard.navbars.sidebar activePage="merchants"></x-dashboard.navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-dashboard.navbars.navs.auth titlePage="Detail Merchant"></x-dashboard.navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Profil Merchant - {{ $merchant->name }}</h4>
                            </div>
                        </div>
                        <div class="container mt-4 mb-5">
                            <div class="row d-flex justify-content-between mb-3">
                                <div class="card col-lg-5 border-success shadow-lg p-3 bg-body rounded" style="max-width: 33rem;">
                                    <div class="card-header p-3 pt-2">
                                        <h5 class="mb-0">{{ $merchant->name }}</h5>
                                    </div>
                                    <div class="card-body p-3 text-center">
                                        @if ($merchant->image)
                                            <img src="{{ asset('storage/' . $merchant->image) }}" class="d-block mx-auto w-50" alt="{{ $merchant->name }}">
                                        @else
                                            <p>Foto tidak tersedia</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="card col-lg-7 shadow-lg p-3 bg-body rounded">
                                    <div class="card-header p-3 pt-2">
                                        <h5 class="mb-0">Informasi Merchant</h5>
                                    </div>
                                    <div class="card-body p-3">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Nama Merchant</th>
                                                    <td>{{ $merchant->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>{{ $merchant->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kota</th>
                                                    <td>{{ $merchant->city->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Nomor WA</th>
                                                    <td>{{ $merchant->wa_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Deskripsi</th>
                                                    <td style="white-space: normal; word-wrap: break-word;">{{ $merchant->description }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header p-3 mt-2">
                                <h5 class="mb-0">Produk Merchant</h5>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    @foreach($merchant->products as $product)
                                        <div class="col-md-2 mb-3">
                                            <div class="card">
                                                <img src="{{ asset('storage/' . $product->image1) }}" class="card-img-top" alt="{{ $product->name }}">
                                                <div class="card-body p-2">
                                                    <h6 class="card-title">{{ $product->name }}</h6>
                                                    <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-dashboard.layout>
