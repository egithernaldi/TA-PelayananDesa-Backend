@extends('layouts.app')
  
  
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Surat</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $detail->nama }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-4">
                            <input type="text" name="nik" class="form-control" placeholder="NIK" value="{{ $detail->nik }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        
                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-4">
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ $detail->pekerjaan }}" readonly>
                        </div>
                        
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ $detail->alamat }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-4">
                            <input type="text" name="umur" class="form-control" placeholder="Umur" value="{{ $detail->umur }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Tempat Kegiatan</label>
                        <div class="col-sm-4">
                            <input type="text" name="tempatkegiatan" class="form-control" placeholder="Tempat Kegiatan" value="{{ $detail->tempat_kegiatan }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal_kegiatan" class="form-control" value="{{ $detail->tanggal_kegiatan }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-4">
                            <input type="text" name="kegiatan" class="form-control" placeholder="Nama Kegiatan" value="{{ $detail->nama_kegiatan }}" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
