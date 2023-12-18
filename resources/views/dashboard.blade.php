@extends('layouts.app')

@section('title')
    <b>Dashboard</b>
@endsection

@section('contents')
    <div class="row">

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header bg-danger text-white d-flex flex-row align-items-center justify-content-between">
                    <h5 class="mb-0 text-white-800">S.K DOMISILI</h5>
                    <i class="fas fa-home fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <h1 class="h1 mb-4">18</h1>
                    <a class="btn btn-danger btn-user btn-block" href="{{ route('domisili') }}">Lihat Permintaan</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header bg-dark text-white d-flex flex-row align-items-center justify-content-between">
                    <h5 class="mb-0 text-white-800">S.K USAHA</h5>
                    <i class="fas fa-store fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <h1 class="h1 mb-4">18</h1>
                    <a class="btn btn-dark btn-user btn-block" href="{{ route('usaha') }}">Lihat Permintaan</a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header bg-primary text-white d-flex flex-row align-items-center justify-content-between">
                    <h5 class="mb-0 text-white-800">S.K BELUM NIKAH</h5>
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <h1 class="h1 mb-4">18</h1>
                    <a class="btn btn-primary btn-user btn-block" href="{{ route('nikah') }}">Lihat Permintaan</a>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header bg-info text-white d-flex flex-row align-items-center justify-content-between">
                    <h5 class="mb-0 text-white-500">S.K KERAMAIAN</h5>
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div class="card-body text-center">
                    <h1 class="h1 mb-4">18</h1>
                    <a class="btn btn-info btn-user btn-block" href="{{ route('keramaian') }}">Lihat Permintaan</a>
                </div>
            </div>
        </div>
    </div>


@endsection
