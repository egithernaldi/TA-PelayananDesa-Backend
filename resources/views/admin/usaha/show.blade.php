@extends('layouts.app')
  
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Detail Surat</h1>
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
                        <label class="col-sm-2 col-form-label">Nama Usaha</label>
                        <div class="col-sm-4">
                            <input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha" value="{{ $detail->nama_usaha }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Tempat Usaha</label>
                        <div class="col-sm-4">
                            <input type="text" name="tempatusaha" class="form-control" placeholder="Tempat Usaha" value="{{ $detail->tempat_usaha }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $detail->alamat }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-4">
                            <input type="text" name="telepon" class="form-control" placeholder="telepon" value="{{ $detail->telepon }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $detail->tanggal_lahir }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-4">
                            <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{ $detail->agama }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-4">
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{ $detail->tempat_lahir }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <input type="text" name="jekel" class="form-control" placeholder="Jenis Kelamin" value="{{ $detail->jenis_kelamin }}" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
