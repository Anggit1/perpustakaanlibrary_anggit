@extends('layouts.master')

@section('topbar')
    @include('part.topbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('judul')
    <h1 class="text-primary">Detail Anggota</h1>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush


@push('scripts')
    <script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
    <script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endpush

@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h4 class="m-0 font-weight-bold text-primary">Profile</h4>
        </div>
        <div class="row d-flex" style="gap:3rem">
            <div class="col-2 ml-5 my-4">
                @if ($profile->photoProfile !=null)
                <img src="{{ asset('/images/photoProfile/' . $profile->photoProfile) }}"
                        style="width:150px;height:150px;border-radius:100px">
                @else
                <img src="{{ asset('template/img/boy.png') }}" style="width:100px;height:100px;border-radius:50px">
                @endif
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="nama" class="text-lg text-primary font-weight-bold">Nama Lengkap</label>
                    <h4>{{ $profile->user->name }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="npm" class="text-lg text-primary font-weight-bold">Nomor Induk Mahasiswa</label>
                    <h4>{{ $profile->npm }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Program Studi</label>
                    <h4>{{ $profile->prodi }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Alamat</label>
                    <h4>{{ $profile->alamat }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Nomor Telephone</label>
                    <h4>{{ $profile->noTelp }}</h4>
                </div>

            </div>
        </div>
        <div class="edit d-flex justify-content-end my-4 mx-4">
            <a href="/anggota" class="btn btn-primary px-5">Kembali</a>
        </div>
    </div>
    <h2 class="text-primary my-4">Daftar Riwayat Pinjaman Anggota</h2>
    <div class="col-lg-auto">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center justify-content-center table-flush table-hover" id="dataTableHover" style="font-size: .7rem">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Wajib Pengembalian</th>
                            <th scope="col">Tanggal Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pinjamanUser as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->kode_buku }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_wajib_kembali }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
