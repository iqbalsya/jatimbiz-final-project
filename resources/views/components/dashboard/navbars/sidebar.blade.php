@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <span class=" h6 pt-1 font-weight-bold text-white">Dashboard Jatim<span class="fw-normal">BIZ</span></span>
        </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white d-flex align-items-center {{ $activePage == 'user-profile' ? 'active bg-gradient-success' : '' }}" href="{{ route('user-profile') }}">
                    <i class="material-icons opacity-10 pb-1" style="font-size: 1.8rem; margin-right: 8px;">account_circle</i>
                    <span class="nav-link-text">User Profile</span>
                </a>
            </li>

                <hr class="flex-grow-1 border-white opacity-8 ms-3 me-3 mt-2 mb-2">

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'users' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('users.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">people</i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'cities' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('cities.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">corporate_fare</i>
                    </div>
                    <span class="nav-link-text ms-1">Kota</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'categories' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('categories.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Kategori</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'products' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('products.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">inventory_2</i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'merchants' ? ' active bg-gradient-success' : '' }} "
                    href="{{ route('merchants.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10 pb-1">store</i>
                    </div>
                    <span class="nav-link-text ms-1">Merchant</span>
                </a>
            </li>

    </div>

</aside>
