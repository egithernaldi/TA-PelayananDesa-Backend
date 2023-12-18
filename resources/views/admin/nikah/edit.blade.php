@extends('layouts.app')
  
@section('title', 'Edit Surat')
  
@section('contents')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Edit Surat</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('nikah.update', $detail->id) }}" method="POST">
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
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <input type="text" name="jekel" class="form-control" placeholder="Jenis Kelamin" value="{{ $user->jenis_kelamin }}" readonly>
                        </div>

                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-4">
                            <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir" value="{{ $user->tempat_lahir }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-4">
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ $user->pekerjaan }}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-4">
                            <input type="text" name="Alamat" class="form-control" placeholder="Alamat" value="{{ $user->alamat }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}" readonly>
                        </div>

                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-4">
                            <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{ $user->agama }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-12 text-end">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <h1>Silahkan Ubah Surat Pada Bagian Profil</h1>
    </div>
@endsection
