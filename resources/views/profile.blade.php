@extends('layouts.app')

@section('contents')

<form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile.update') }}" class="user">

        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        @csrf
                        <div class="col-md-6">
                            <label class="labels">NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK"
                                value="{{ auth()->user()->nik }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                value="{{ auth()->user()->nama }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" class="form-control"
                                value="{{ auth()->user()->email }}" placeholder="Email" readonly>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Phone Number"
                                value="{{ auth()->user()->no_hp }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Address</label>
                            <input type="text" name="alamat" class="form-control" value="{{ auth()->user()->alamat }}"
                                placeholder="Address">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ auth()->user()->tanggal_lahir }}">
                        </div>
                    </div>

                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                            type="submit">Save Profile</button></div>
                </div>
            </div>

        </div>

    </form>
@endsection
