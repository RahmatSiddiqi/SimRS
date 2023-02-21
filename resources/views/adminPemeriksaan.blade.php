@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #EEEEEE">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12 mt-3">
                    <h3 class="text-center mt-2 mb-4">Data Pemeriksaan Pasien</h3>
                    <table id="tabel1" class="table table-bordered text-white border-dark"
                        style="background-color: #00ADB5">
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
                                    <td><button type="button" class="btn btn-info button-see" data-bs-toggle="modal"
                                            data-bs-target="#editModal" data-rw="{{ $item->no_rawat }}"
                                            data-nm="{{ $item->nama_pasien }}" data-rg="{{ $item->no_registrasi }}"
                                            data-nik="{{ $item->NIK }}" data-rm="{{ $item->no_rm }}"
                                            data-idp="{{ $item->id_poli }}" data-pl="{{ $item->nm_poli }}"
                                            data-tgl="{{ $item->tgl_registrasi }}" data-dk="{{ $item->nm_dokter }}"
                                            data-ket="{{ $item->ket_diagnosa }}">Detail
                                            Pasien</button></td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {{-- modal edit data --}}
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">detail Data </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('pemeriksaan-edit') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">NO Rawat</label>
                                            <input readonly type="text" name="no_rawat" id="rw"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input readonly type="text" name="nama_pasien" id="nm"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No registrasi</label>
                                            <input readonly type="text" name="no_registrasi" id="rg"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input readonly type="text" name="NIK" id="nik"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No rekam medic</label>
                                            <input readonly type="text" name="no_rm" id="rm"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">ID Poli</label>
                                            <input readonly type="text" name="id_poli" id="idp"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Poli</label>
                                            <input readonly type="text" name="nm_poli" id="pl"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">tanggal Registrasi</label>
                                            <input readonly type="date" name="tgl_registrasi" id="tgl"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pemeriksa</label>
                                            <input readonly type="text" name="nm_dokter" id="dk"
                                                class="form-control" placeholder="Masukkan nomor rekam medik">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hasil Diagnosa</label>
                                            <input type="text" name="ket_diagnosa" id="ket"
                                                class="form-control" placeholder="Masukkan hasil diagnosa">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end modal edit data --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $('.button-see').click(e => {
            $('#nm').val(e.currentTarget.dataset['nm']);
            $('#rw').val(e.currentTarget.dataset['rw']);
            $('#rg').val(e.currentTarget.dataset['rg']);
            $('#nik').val(e.currentTarget.dataset['nik']);
            $('#rm').val(e.currentTarget.dataset['rm']);
            $('#idp').val(e.currentTarget.dataset['idp']);
            $('#pl').val(e.currentTarget.dataset['pl']);
            $('#tgl').val(e.currentTarget.dataset['tgl']);
            $('#dk').val(e.currentTarget.dataset['dk']);
            $('#ket').val(e.currentTarget.dataset['ket']);
        });
    </script>
@endpush
