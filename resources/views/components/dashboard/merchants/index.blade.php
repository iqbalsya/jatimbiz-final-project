<x-dashboard.layout bodyClass="g-sidenav-show bg-gray-200">
    <x-dashboard.navbars.sidebar activePage="merchants"></x-dashboard.navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-dashboard.navbars.navs.auth titlePage="Merchants"></x-dashboard.navbars.navs.auth>
        <div class="container-fluid">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @if(session('success'))
                <div class="alert alert-light alert-dismissible text-dark fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">thumb_up</span>
                    </span>
                    <strong>&nbsp;Berhasil&nbsp;-&nbsp;</strong>{{ session('success') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h4 class="text-white text-capitalize ps-3">List Merchant</h4>
                            </div>
                        </div>
                        <div class="container mt-2 mb-3">
                            <div class="my-3 text-end">
                                <a class="btn bg-gradient-success mb-0" href="{{ route('merchants.create') }}">
                                    <i class="material-icons text-xl">add</i>&nbsp;Tambah Merchant
                                </a>
                            </div>
                            <table class="table table-striped table-bordered data-table">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center" width="16px">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center" width="200px">Kota</th>
                                        <th class="text-center" width="100px">Nomor WA</th>
                                        <th class="text-center" width="100px">Gambar</th>
                                        <th class="text-center" width="16px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($merchants as $merchant)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $merchant->name }}</td>
                                            <td class="text-center">{{ $merchant->city->name }}</td>
                                            <td class="text-center">{{ $merchant->wa_number }}</td>
                                            <td class="text-center">
                                                @if ($merchant->image)
                                                    <img src="{{ asset('storage/' . $merchant->image) }}" alt="{{ $merchant->name }}" width="80">
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('merchants.show', $merchant->id) }}" class="edit btn btn-info btn-link btn-md m-0 p-2"><i class="material-icons">visibility</i></a>

                                                <a href="{{ route('merchants.edit', $merchant->id) }}" class="edit btn btn-warning btn-link btn-md m-0 p-2"><i class="material-icons">edit</i></a>

                                                <form action="{{ route('merchants.destroy', $merchant->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="edit btn btn-danger btn-link btn-md m-0 p-2"><i class="material-icons">delete</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.data-table').DataTable({
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data merchant",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ merchant",
                            paginate: {
                                previous: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_left</i>',
                                next: '<i class="material-icons opacity-10 fs-4">keyboard_double_arrow_right</i>'
                            }
                        }
                    });

                    setTimeout(function() {
                        $('.alert').fadeOut('slow', function() {
                            $(this).remove();
                        });
                    }, 5000);
                });

                function confirmDelete() {
                    return confirm('Apakah Anda yakin ingin menghapus merchant ini?');
                }
            </script>
        </div>
    </main>
</x-dashboard.layout>
