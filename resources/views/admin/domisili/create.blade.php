@extends('layouts.app')

@section('contents')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Buat Surat</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('keramaian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" >
                    </div>
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" name="nik" class="form-control" placeholder="NIK" >
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <input type="text" name="jekel" class="form-control" placeholder="Jenis Kelamin">
                    </div>

                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-4">
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <label class="col-sm-2 col-form-label">Kewarganegaraan</label>
                    <div class="col-sm-4">
                        <input type="text" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_lahir" class="form-control">
                    </div>

                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-4">
                        <input type="text" name="agama" class="form-control" placeholder="Agama">
                    </div>
                </div>

                <div class="row">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>           
    </div>
</div>
@endsection
