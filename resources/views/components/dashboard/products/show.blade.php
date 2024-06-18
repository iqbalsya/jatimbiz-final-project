<x-dashboard.layout bodyClass="g-sidenav-show bg-gray-200">
    <x-dashboard.navbars.sidebar activePage="products"></x-dashboard.navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-dashboard.navbars.navs.auth titlePage="Detail Produk"></x-dashboard.navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Detail Produk - {{ $product->name }}</h4>
                            </div>
                        </div>
                        <div class="container mt-4 mb-5">
                            <div class="row d-flex justify-content-between mb-3">
                                    <div class="card col-lg-5 shadow-lg p-3 bg-body rounded">
                                        <div class="card-header p-3 pt-2">
                                            <h5 class="mb-0">Foto Produk</h5>
                                        </div>
                                        <div class="card-body p-3 mt-2">
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

                                    <div class="card col-lg-7 shadow-lg p-3 bg-body rounded">
                                        <div class="card-header p-3 pt-2">
                                            <h5 class="mb-0">Informasi Produk</h5>
                                        </div>
                                        <div class="card-body p-3">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Nama Produk</th>
                                                        <td>{{ $product->name }}</td>
                                                    </tr class="align-middle" height="64px">
                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Merchant</th>
                                                        <td>{{ $product->merchant->name }}</td>
                                                    </tr >
                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Kategori</th>
                                                        <td>{{ $product->category->name }}</td>
                                                    </tr>
                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Harga</th>
                                                        <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                                    </tr>
                                                                                                                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Berat</th>
                                                        <td>{{ $product->weight }} gram</td>
                                                    </tr>
                                                                                                                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Kondisi</th>
                                                        <td>{{ $product->condition }}</td>
                                                    </tr>

                                                    <tr class="align-middle" height="64px">
                                                        <th scope="row">Deskripsi</th>
                                                        <td style="white-space: normal; word-wrap: break-word;">{{ $product->description }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card mt-4 shadow-lg p-3 bg-body rounded">
                                        <div class="card-header p-3 pt-2">
                                            <h5 class="mb-0">Link Pembelian</h5>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="">
                                                @if ($product->purchase_link_shopee)
                                                    <a href="{{ $product->purchase_link_shopee }}" class="btn btn-warning m-1" target="_blank">Link Shopee</a>
                                                @endif
                                                @if ($product->purchase_link_tokopedia)
                                                    <a href="{{ $product->purchase_link_tokopedia }}" class="btn btn-success m-1" target="_blank">Link Tokopedia</a>
                                                @endif
                                                @if ($product->purchase_link_lazada)
                                                    <a href="{{ $product->purchase_link_lazada }}" class="btn btn-info m-1" target="_blank">Link Lazada</a>
                                                @endif
                                                @if ($product->purchase_link_tiktokshop)
                                                    <a href="{{ $product->purchase_link_tiktokshop }}" class="btn btn-primary m-1" target="_blank">Link Tiktokshop</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-dashboard.layout>

<script>
    function changeImage(src) {
        let activeItem = document.querySelector('.carousel-item.active img');
        activeItem.src = src;
    }
</script>
