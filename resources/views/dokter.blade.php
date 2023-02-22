@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #EEEEEE">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path
                            d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                        <path
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                    </svg>
                    Tambah Dokter</button>

                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#akunModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path
                            d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                        <path
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                    </svg>
                    Tambah Akun Dokter</button>

                <a href="{{ route('dokter-akun') }}"><button type="button" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-vcard" viewBox="0 0 16 16">
                            <path
                                d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                            <path
                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                        </svg>
                        Lihat Akun Dokter</button></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center mt-2 mb-4">Data Dokter</h3>
                <table id="tabel1" class="table table-bordered text-white border-dark" style="background-color: #00ADB5">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">KODE DOKTER</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">POLI</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kd_dokter }}</td>
                                <td>{{ $item->nm_dokter }}</td>
                                <td>{{ $item->nm_poli }}</td>
                                <td><button type="button" class="btn btn-warning button-edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-rm="{{ $item->kd_dokter }}"
                                        data-nama-pasien="{{ $item->nm_dokter }}" data-nik="{{ $item->id_poli }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg></button>
                                    <a href="/dokter-delete/{{ $item->kd_dokter }}"><button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eraser-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z" />
                                            </svg>
                                        </button></a>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('dokter-add') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Kode dokter</label>
                                        <input type="text" name="kd_dokter" class="form-control"
                                            placeholder="Masukkan kode dokter">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nm_dokter" class="form-control"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div>
                                        <label for="">Poli</label>
                                        <select name="id_poli" id="" class="form-control inputbox">
                                            <option value="null">--pilih Poli--</option>
                                            @foreach ($poli as $item)
                                                <option value="{{ $item->id_poli }}">{{ $item->nm_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    {{-- <h6>Buat akun</h6>
                                    <div class="form-group">
                                        <label for="">name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Masukkan nama panggilan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Masukkan email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Masukkan kode dokter">
                                    </div> --}}
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
                {{-- end modal tambah data --}}
                {{-- modal tambah akun --}}
                <div class="modal fade" id="akunModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah akun Dokter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('dokter-addAkun') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div>
                                        <label for="">Dokter</label>
                                        <select name="kd_dokter" id="" class="form-control inputbox">
                                            <option value="null">--pilih Dokter--</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->kd_dokter }}">{{ $item->nm_dokter }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Masukkan nama panggilan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Masukkan email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Masukkan kode dokter">
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
                {{-- end modal tambah akun --}}
                {{-- modal edit data --}}
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Dokter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('dokter-edit') }}" method="POST">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="">Kode Dokter</label>
                                        <input readonly type="text" name="kd_dokter" id="kd_dokter"
                                            class="form-control" placeholder="Masukkan nomor rekam medik">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nm_dokter" id="nama-dokter" class="form-control"
                                            placeholder="Masukkan nama">
                                    </div>
                                    <div>
                                        <label for="">Poli</label>
                                        <select name="id_poli" id="poli" class="form-control inputbox">
                                            <option value="id_poli">--pilih Poli--</option>
                                            @foreach ($poli as $item)
                                                <option value="{{ $item->id_poli }}">{{ $item->nm_poli }}</option>
                                            @endforeach
                                        </select>
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
            $('#kd_dokter').val(e.currentTarget.dataset['rm']);
            $('#nama-dokter').val(e.currentTarget.dataset['namaPasien']);
            $('#poli').val(e.currentTarget.dataset['nik']);
        });
    </script>
@endpush
