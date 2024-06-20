<div class="container-fluid fixed-top">
    <div class="container topbar bg-success d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small><i class="fas fa-envelope me-1 text-secondary"></i><a href="#" class="text-white">jatimbiz@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ url('/') }}" class="navbar-brand"><h1 class="text-success display-6">Jatim<span class="fw-normal">BIZ</span></h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('home') ? 'active text-success fw-bold' : '' }}">Home</a>
                    <a href="{{ url('/umkm') }}" class="nav-item nav-link {{ Request::is('umkm') || Request::is('umkm/*') ? 'active text-success fw-bold' : '' }}">UMKM</a>
                    <a href="{{ url('/product') }}" class="nav-item nav-link {{ Request::is('product') || Request::is('product/*') ? 'active text-success fw-bold' : '' }}">Produk</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active text-success fw-bold' : '' }}">Kontak</a>
                </div>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-success py-2 px-4 d-none d-lg-block rounded-pill">Masuk</a>
                @endguest

                @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success py-2 px-4 d-none d-lg-block rounded-pill">Keluar</button>
                </form>
                @endauth
            </div>
        </nav>
    </div>
</div>
