<?php

namespace App\Http\Controllers;

use App\Models\Detailsurat;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\File;

class suratdomisiliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Detailsurat::all();

        return view('admin.domisili.index', ['detail' => $detail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.domisili.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Detailsurat::create($request->all());

        return redirect()->route('domisili')->with('success', 'Surat added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = Detailsurat::join('users', 'detailsurats.id_user', '=', 'users.id')
            ->join('surats', 'detailsurats.id_surat', '=', 'surats.id')
            ->select(
                'detailsurats.*',
                'users.*',
                'surats.*'
            )
            ->where('detailsurats.id', $id)
            ->first();

        return view('admin.domisili.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = Detailsurat::find($id);
        $user = User::find($detail->id_user);

        return view('admin.domisili.edit', [
            'detail' => $detail,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detail = Detailsurat::find($id);

        $detail->update($request->all());

        return redirect()->route('domisili.edit', ['id' => $detail->id])->with('success', 'Surat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = Detailsurat::find($id);

        $detail->delete();

        return redirect()->route('domisili')->with('success', 'Surat deleted successfully');
    }

    public function pengajuanUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'status_pengajuan' => 'required|in:2,3,4', // Sesuaikan dengan nilai yang diizinkan
        ]);

        $detail = Detailsurat::findOrFail($id);
        $detail->update(['status_pengajuan' => $request->input('status_pengajuan')]);

        switch ($detail->status_pengajuan) {
            case Detailsurat::STATUS_APPROVED:
                $status = 'Verifikasi Berhasil';
                break;

            case Detailsurat::STATUS_REJECTED:
                $status = 'Verifikasi Gagal';
                break;

            case Detailsurat::STATUS_DONE:
                $status = 'Selesai';
                break;

            default:
                $status = 'Menunggu Verifikasi';
                break;
        }

        return redirect()->route('domisili')->with('success', 'Status pengajuan berhasil diubah: ' . $status);
    }
    public function cetak(string $id)
    {
        $detail = Detailsurat::join('users', 'detailsurats.id_user', '=', 'users.id')
            ->join('surats', 'detailsurats.id_surat', '=', 'surats.id')
            ->select(
                'detailsurats.*',
                'users.*',
                'surats.*'
            )
            ->where('detailsurats.id', $id)
            ->first();

        return view('admin.domisili.cetak', compact('detail'));
    }
}
