@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #EEEEEE">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    Tambah Data</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center mt-2 mb-4">Data Pasien</h3>
                <table id="tabel1" class="table table-bordered text-white border-dark" style="background-color: #00ADB5">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NO REKAM MEDIK</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NIK</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->no_rm }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                <td>{{ $item->NIK }}</td>
                                <td><button type="button" class="btn btn-warning button-edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-rm="{{ $item->no_rm }}"
                                        data-nama-pasien="{{ $item->nama_pasien }}" data-nik="{{ $item->NIK }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg></button>
                                    <a href="/pasien-delete/{{ $item->no_rm }}"><button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eraser-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z" />
                                            </svg>
                                        </button></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- modal tambah data --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pasien-add') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">NO Rekam Medis</label>
                                        <input type="text" name="no_rm" class="form-control"
                                            placeholder="Masukkan nomor rekam medik">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama_pasien" class="form-control"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIK</label>
                                        <input type="text" name="NIK" class="form-control"
                                            placeholder="Masukkan NIK">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end modal tambah data --}}
                {{-- modal edit data --}}
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pasien-edit') }}" method="POST">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="">NO Rekam Medis</label>
                                        <input readonly type="text" name="no_rm" id="no_rm"
                                            class="form-control" placeholder="Masukkan nomor rekam medik">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama_pasien" id="nama-pasien" class="form-control"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIK</label>
                                        <input type="text" name="NIK" id="nik" class="form-control"
                                            placeholder="Masukkan NIK">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end modal edit data --}}
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $('.button-edit').click(e => {
            $('#no_rm').val(e.currentTarget.dataset['rm']);
            $('#nama-pasien').val(e.currentTarget.dataset['namaPasien']);
            $('#nik').val(e.currentTarget.dataset['nik']);
        });
    </script>
@endpush
