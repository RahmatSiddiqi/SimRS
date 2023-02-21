@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #EEEEEE">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                        <path
                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z" />
                    </svg>
                    Tambah Diagnosa</button>
                <h3 class="text-center mt-2 mb-4">Data Pemeriksaan Pasien</h3>
                <table id="tabel1" class="table table-bordered text-white border-dark" style="background-color: #00ADB5">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NO RAWAT</th>
                            <th scope="col">NO REGISTRASI</th>
                            <th scope="col">POLI</th>
                            <th scope="col">PEMERIKSA</th>
                            <th scope="col">HASIL DIAGNOSA</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama_pasien }}</td>
                                <td>{{ $item->no_rawat }}</td>
                                <td>{{ $item->no_registrasi }}</td>
                                <td>{{ $item->nm_poli }}</td>
                                <td>{{ $item->nm_dokter }}</td>
                                <td>{{ $item->ket_diagnosa }}</td>
                                <td><button type="button" class="btn btn-warning button-edit" data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-rw="{{ $item->no_rawat }}"
                                        data-ket="{{ $item->ket_diagnosa }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg></button>
                                    <a href="/pemeriksaan-pasiendelete/{{ $item->no_rawat }}"><button
                                            class="btn btn-danger">
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Diagnosa Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pemeriksaan-add') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div>
                                        <label for="">No Rawat</label>
                                        <select name="no_rawat" id="" class="form-control inputbox">
                                            <option value="">--pilih No rawat--</option>
                                            @foreach ($registrasi_pasien as $item)
                                                <option value="{{ $item->no_rawat }}">{{ $item->no_rawat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">dokter</label>
                                        <select name="kd_dokter" id="" class="form-control inputbox">
                                            <option value="">--pilih dokter--</option>
                                            @foreach ($user as $item)
                                                <option value="{{ $item->kd_dokter }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hasil Diagnosa</label>
                                        <input type="text" name="ket_diagnosa" class="form-control"
                                            placeholder="Masukkan hasil diagnosa">
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
                            <form action="{{ route('pemeriksaan-edit') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div>
                                        <label for="">No Rawat</label>
                                        <select name="no_rawat" id="rw" class="form-control inputbox">
                                            <option value="">--pilih No rawat--</option>
                                            @foreach ($registrasi_pasien as $item)
                                                <option value="{{ $item->no_rawat }}">{{ $item->no_rawat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hasil Diagnosa</label>
                                        <input type="text" name="ket_diagnosa" id="ket" class="form-control"
                                            placeholder="Masukkan hasil diagnosa">
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
            $('#ket').val(e.currentTarget.dataset['ket']);
            $('#rw').val(e.currentTarget.dataset['rw']);
        });
    </script>
@endpush
