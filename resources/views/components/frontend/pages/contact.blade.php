@extends('layouts.app')

@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5" style="background-image: url('{{ asset('assets/img/jatim.jpg') }}'); background-size: cover; background-position: center;">
    <h1 class="text-center text-white display-6">Hubungi Kami</h1>
</div>
<!-- Single Page Header End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-success">Get in touch</h1>
                        <p class="mb-4">Kami adalah tim yang berdedikasi untuk meningkatkan perekonimian wilayah Jawa Timur dengan mendunkung UMKM di wilayah lokal. Hubungi kami untuk mendaftarkan UMKM dan produkmu disini!</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2027928.7027891946!2d113.58324044999999!3d-6.914709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da393f79feeb5c5%3A0x1030bfbca7cb850!2sJawa%20Timur!5e0!3m2!1sid!2sid!4v1718737863529!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fa fa-map-marker-alt fa-2x text-success me-4"></i>
                        <div>
                            <h4>Alamat</h4>
                            <p class="mb-2">Jl. Setiabudi No.24 Surabaya</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-success me-4"></i>
                        <div>
                            <h4>Email ke</h4>
                            <p class="mb-2">jatimbiz@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-success me-4"></i>
                        <div>
                            <h4>Telepon</h4>
                            <p class="mb-2">+62813 7981 8339</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
