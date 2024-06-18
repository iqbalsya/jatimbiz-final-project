<x-dashboard.layout bodyClass="g-sidenav-show bg-gray-200">
    <x-dashboard.navbars.sidebar activePage="products"></x-dashboard.navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-dashboard.navbars.navs.auth titlePage="Edit Produk"></x-dashboard.navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Edit Produk - {{ $product->name }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <h5 class="mb-3 ms-2">Informasi Produk</h5>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="merchant_id">Merchant&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-control @error('merchant_id') is-invalid @enderror" id="merchant_id" name="merchant_id">
                                                <option value="">Pilih Merchant</option>
                                                @foreach($merchants as $merchant)
                                                    <option value="{{ $merchant->id }}" {{ $product->merchant_id == $merchant->id ? 'selected' : '' }}>{{ $merchant->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('merchant_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category_id">Kategori&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                                <option value="">Pilih Kategori</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Nama Produk&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="price">Harga&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="weight">Berat (gram)&nbsp;<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', $product->weight) }}">
                                            @error('weight')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="condition">Kondisi&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition">
                                                <option value="">Pilih Kondisi</option>
                                                <option value="baru" {{ $product->condition === 'baru' ? 'selected' : '' }}>Baru</option>
                                                <option value="bekas" {{ $product->condition === 'bekas' ? 'selected' : '' }}>Bekas</option>
                                            </select>
                                            @error('condition')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <h5 class="mb-3 ms-2">Gambar Produk</h5>
                                    @foreach (range(1, 5) as $i)
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="image{{ $i }}">Gambar {{ $i }}</label>
                                                <input type="file" class="form-control" id="image{{ $i }}" name="image{{ $i }}">
                                                @if ($product->{'image'.$i})
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $product->{'image'.$i}) }}" alt="Gambar {{ $i }}" class="img-thumbnail" width="100">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row mt-5">
                                    <h5 class="mb-3 ms-2">Link Pembelian Produk</h5>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="purchase_link_shopee">Link Pembelian Shopee</label>
                                            <input type="url" class="form-control" id="purchase_link_shopee" name="purchase_link_shopee" value="{{ old('purchase_link_shopee', $product->purchase_link_shopee) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="purchase_link_tokopedia">Link Pembelian Tokopedia</label>
                                            <input type="url" class="form-control" id="purchase_link_tokopedia" name="purchase_link_tokopedia" value="{{ old('purchase_link_tokopedia', $product->purchase_link_tokopedia) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="purchase_link_lazada">Link Pembelian Lazada</label>
                                            <input type="url" class="form-control" id="purchase_link_lazada" name="purchase_link_lazada" value="{{ old('purchase_link_lazada', $product->purchase_link_lazada) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="purchase_link_tiktokshop">Link Pembelian Tiktokshop</label>
                                            <input type="url" class="form-control" id="purchase_link_tiktokshop" name="purchase_link_tiktokshop" value="{{ old('purchase_link_tiktokshop', $product->purchase_link_tiktokshop) }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
                                    <button type="submit" class="btn btn-success mb-0 mt-3">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-dashboard.layout>
