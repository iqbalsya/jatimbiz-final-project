<x-dashboard.layout bodyClass="g-sidenav-show bg-gray-200">
    <x-dashboard.navbars.sidebar activePage="merchants"></x-dashboard.navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-dashboard.navbars.navs.auth titlePage="Edit Merchant"></x-dashboard.navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">Edit Merchant</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('merchants.update', $merchant->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <h5 class="mb-3 ms-2">Informasi Merchant</h5>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Nama Merchant&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $merchant->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email">Email&nbsp;<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $merchant->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="city_id">Kota&nbsp;<span class="text-danger">*</span></label>
                                            <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                                                <option value="">Pilih Kota</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ old('city_id', $merchant->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="wa_number">Nomor WA&nbsp;<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('wa_number') is-invalid @enderror" id="wa_number" name="wa_number" value="{{ old('wa_number', $merchant->wa_number) }}">
                                            @error('wa_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $merchant->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <h5 class="mb-3 ms-2">Gambar Merchant</h5>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="image">Gambar</label>
                                            @if($merchant->image)
                                                <img src="{{ asset('storage/' . $merchant->image) }}" alt="{{ $merchant->name }}" width="80" class="d-block mb-2">
                                            @endif
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('merchants.index') }}" class="btn btn-secondary mb-0 mt-3 me-2">Batal</a>
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
