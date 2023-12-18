@extends('layouts.app')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="mb-0">Surat Keterangan Keramaian</h2>
        <a href="{{ route('keramaian.create') }}" class="btn btn-primary">Buat Surat</a>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover mt-3">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Kewarganegaraan</th>
                <th>Status Pengajuan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = 1;
            @endphp
            @forelse($detail as $rs)
            @php
                $user = App\Models\User::find($rs->id_user)
            @endphp
                {{-- Menambahkan kondisi untuk mengelompokkan jenis surat --}}
                @if($rs->id_surat == 4) {{-- Sesuaikan dengan ID jenis surat yang diinginkan --}}
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{!! $rs->status !!}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('keramaian.show', $rs->id) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('keramaian.edit', $rs->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('keramaian.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if ($rs->status_pengajuan != 4)
                                            <form action="{{ route('keramaian.updateStatus', $rs->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_pengajuan" value="2">
                                                <button class="dropdown-item" onclick="return confirm('Yakin ingin mengubah status pengajuan?')">Diterima</button>
                                            </form>
                                            <form action="{{ route('keramaian.updateStatus', $rs->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_pengajuan" value="4">
                                                <button class="dropdown-item" onclick="return confirm('Yakin ingin mengubah status pengajuan?')">Selesai</button>
                                            </form>
                                            <form action="{{ route('keramaian.updateStatus', $rs->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_pengajuan" value="3">
                                                <button class="dropdown-item" onclick="return confirm('Yakin ingin mengubah status pengajuan?')">Ditolak</button>
                                            </form>
                                        @else
                                            <button class="dropdown-item" disabled>Selesai</button>
                                            <a href="{{ route('admin.keramaian.cetak', $rs->id) }}" target="_blank" class="btn btn-warning">Cetak</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
                {{-- Akhir dari kondisi --}}
            @empty
                <tr>
                    <td class="text-center" colspan="6">Surat Tidak Ada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
