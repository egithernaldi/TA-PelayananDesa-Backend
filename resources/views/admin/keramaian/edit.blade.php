@extends('layouts.app')
  
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Edit Surat</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('keramaian.update', $detail->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $user->nama }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-4">
                            <input type="text" name="nik" class="form-control" placeholder="NIK" value="{{ $user->nik }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        
                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-4">
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ $user->pekerjaan }}" readonly>
                        </div>
                        
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ $user->alamat }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-4">
                            <input type="text" name="umur" class="form-control" placeholder="Umur" value="{{ $detail->umur }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Tempat Kegiatan</label>
                        <div class="col-sm-4">
                            <input type="text" name="tempatkegiatan" class="form-control" placeholder="Tempat Kegiatan" value="{{ $detail->tempat_kegiatan }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ $detail->tanggal_kegiatan }}" >
                        </div>
                        <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-4">
                            <input type="text" name="kegiatan" class="form-control" placeholder="Nama Kegiatan" value="{{ $detail->nama_kegiatan }}" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
