<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelas::get();
        return view('kelas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'status_kelas' => 'required',
            'nip' => 'required',
        ]);

        $data = Kelas::where('id', $id)->first();
        $data->nip = $request->get('id');
        $data->nama = $request->get('nama');
        $data->status_kelas = $request->get('status_kelas');
        $data->nip = $request->get('nip');
        $data->save();

        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kelas::find($id);   
        return view('kelas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'status_kelas' => 'required',
            'nip' => 'required',
        ]);

        $data = Kelas::where('id', $id)->first();
        $data->nip = $request->get('id');
        $data->nama = $request->get('nama');
        $data->status_kelas = $request->get('status_kelas');
        $data->nip = $request->get('nip');
        $data->save();

        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::find($id)->delete();
        return redirect()->route('kelas.index');
    }
}
