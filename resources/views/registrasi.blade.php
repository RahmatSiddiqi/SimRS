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
                    Tambah Registrasi</button>

                <a href="/registrasi-pasiensee"><button type="button" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                        Update Delete Registrasi</button></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center mt-2 mb-4">Data Registrasi Pasien</h3>
                <div class="dropdown mb-2">
                    <p>Filter Registrasi Pasien :</p>
                    <form action="/registrasi-pasien" method="GET">
                        <div class="col-sm-6 d-inline-flex">
                            <input name="keyword" placeholder="Masukkan nama poli " type="text"
                                class="form-control mx-1">
                            <br>
                            <input type="submit" style="border-radius: 10%; background-color: #00ADB5" value="Filter">
                        </div>
                    </form>
                </div>
                <table id="tabel1" class="table table-bordered text-white border-dark" style="background-color: #00ADB5">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NO REKAM MEDIK</th>
                            <th scope="col">NO REGISTRASI</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NIK</th>
                            <th scope="col">POLI</th>
                            <th scope="col">TANGGAL REGISTRASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->no_rm }}</td>
                                <td>{{ $item->no_registrasi }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                <td>{{ $item->NIK }}</td>
                                <td>{{ $item->nm_poli }}</td>
                                <td>{{ $item->tgl_registrasi }}</td>
                                {{-- <td><button type="button" class="btn btn-warning button-edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-rm="{{ $item->no_rm }}"
                                        data-registrasi="{{ $item->no_registrasi }}" data-rw="{{ $item->no_rawat }}"
                                        data-pl="{{ $item->id_poli_tujuan }}" data-tgl="{{ $item->tgl_registrasi }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg></button>
                                    <a href="/registrasi-delete/{{ $item->no_rm }}"><button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eraser-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z" />
                                            </svg>
                                        </button></a>
                                </td> --}}
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Registrasi Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('registrasi-add') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div>
                                        <label for="">Pasien</label>
                                        <select name="no_rm" id="" class="form-control inputbox">
                                            <option value="null">--pilih Pasien--</option>
                                            @foreach ($pasien as $item)
                                                <option value="{{ $item->no_rm }}">{{ $item->nama_pasien }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NO Registrasi</label>
                                        <input type="text" name="no_registrasi" class="form-control"
                                            placeholder="Masukkan nomor registrasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NO Rawat</label>
                                        <input type="text" name="no_rawat" class="form-control"
                                            placeholder="Masukkan nomor rawat">
                                    </div>
                                    <div>
                                        <label for="">Poli tujuan</label>
                                        <select name="id_poli_tujuan" id="" class="form-control inputbox">
                                            <option value="null">--pilih Poli--</option>
                                            @foreach ($poli as $item)
                                                <option value="{{ $item->id_poli }}">{{ $item->nm_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Registrasi</label>
                                        <input type="date" name="tgl_registrasi" class="form-control">
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
                            <form action="{{ route('registrasi-edit') }}" method="POST">
                                @csrf
                                <div class="modal-body">

                                    <div>
                                        <label for="">Pasien</label>
                                        <select name="no_rm" id="pasien" class="form-control inputbox">
                                            <option value="null">--pilih Pasien--</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->no_rm }}">{{ $item->nama_pasien }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NO Registrasi</label>
                                        <input type="text" name="no_registrasi" id="regis" class="form-control"
                                            placeholder="Masukkan nomor registrasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="">NO Rawat</label>
                                        <input type="text" name="no_rawat" id="rw" class="form-control"
                                            placeholder="Masukkan nomor rawat">
                                    </div>
                                    <div>
                                        <label for="">Poli tujuan</label>
                                        <select name="id_poli_tujuan" id="pl" class="form-control inputbox">
                                            <option value="null">--pilih Poli--</option>
                                            @foreach ($data as $item)
                                                <option value="{{ $item->id_poli }}">{{ $item->nm_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Registrasi</label>
                                        <input type="date" name="tgl_registrasi" id="tgl" class="form-control">
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
            $('#pasien').val(e.currentTarget.dataset['rm']);
            $('#regis').val(e.currentTarget.dataset['registrasi']);
            $('#rw').val(e.currentTarget.dataset['rw']);
            $('#pl').val(e.currentTarget.dataset['pl']);
            $('#tgl').val(e.currentTarget.dataset['tgl']);
        });
    </script>
@endpush
