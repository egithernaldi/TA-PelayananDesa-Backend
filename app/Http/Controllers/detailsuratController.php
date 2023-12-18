<?php

namespace App\Http\Controllers;

use App\Models\Detailsurat;
use Illuminate\Http\Request;



class detailsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Detailsurat::orderBy('created_at', 'DESC')->get();
        

        return view('dashboard.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Detailsurat::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Surat added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = Detailsurat::findOrFail($id);

        return view('dashboard.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detail = Detailsurat::findOrFail($id);

        return view('dashboard.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detail = Detailsurat::findOrFail($id);

        $detail->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Surat updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = Detailsurat::findOrFail($id);

        $detail->delete();

        return redirect()->route('dashboard')->with('success', 'Surat deleted successfully');
    }
}
