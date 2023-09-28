<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\User;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengajar::get();
        return view('pengajar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Pengajar = Pengajar::get();
        return view('pengajar.create', compact('Pengajar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'status_pengajar' => 'required',
        ]);

        $data = new Pengajar;
        $data->nip = $request->get('nip');
        $data->nama = $request->get('nama');
        $data->email = $request->get('email');
        $data->telp = $request->get('telp');
        $data->status_pengajar = $request->get('status_pengajar');

        $data->save();

        return redirect()->route('pengajar.index')->with('success', 'Tutor Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nip)
    {
        $data = Pengajar::find($nip);
        return view('pengajar.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nip)
    {
        $Pengajar = Pengajar::find($nip);   
        return view('pengajar.edit', compact('Pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nip)
    {
        $request->validate([
            // 'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'status_pengajar' => 'required',
        ]);

        $data = Pengajar::where('nip', $nip)->first();
        // $data->nip = $request->get('nip');
        $data->nama = $request->get('nama');
        $data->email = $request->get('email');
        $data->telp = $request->get('telp');
        $data->status_pengajar = $request->get('status_pengajar');

        $data->save();

        if($data){
            return redirect()->route('pengajar.index')->with('success', 'Pengajar Berhasil Diupdate');
    
            }else{
                return redirect()->route('pengajar.edit',$data->nim)->with('error', 'Pengajar Gagal Di update');
            }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nip)
    {
        Pengajar::find($nip)->delete();
        return redirect()->route('pengajar.index');
    }
}
