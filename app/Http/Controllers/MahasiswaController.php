<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::get();
        return view('mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Mahasiswa = Mahasiswa::get();
        $kelas = Kelas::get();
        return view('mahasiswa.create', compact('Mahasiswa','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'status' => 'required',
            'id_kelas' => 'required',
            'user_id' => 'required',

        ]);

        if($request->file('foto')) {
            $filename = $request->file('foto')->store('foto', 'public');
        }

        $data = new Mahasiswa;
        $data->nim = $request->get('nim');
        $data->nama = $request->get('nama');
        $data->foto = $filename;
        $data->email = $request->get('email');
        $data->telp = $request->get('telp');
        $data->status = $request->get('status');
        $data->id_kelas = $request->get('id_kelas');
        $data->user_id = $request->get('user_id');
        $data->save();

        if ($data->foto && file_exists(storage_path('app/public/'.$data->foto))) {
            \Storage::delete('public/'.$data->foto);
        }

        $filename = $request->file('foto')->store('foto', 'public');
        $data->foto = $filename;

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $data->kelas()->associate($kelas);
        $data->save();
        


        // Mahasiswa::find($Nim)->update($request->all());
        
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nim)
    {
        $Mahasiswa = Mahasiswa::find($nim); 
        $kelas = Kelas::get();  
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $nim)
    {
        $request->validate([
            // 'nim' => 'required',
            'nama' => 'required',
            // 'foto' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'status' => 'required',
            'id_kelas' => 'required',
            // 'user_id' => 'required',
        ]);

        $data = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        // $data->nim = $request->get('nim');
        $data->nama = $request->get('nama');
        $data->email = $request->get('email');
        $data->telp = $request->get('telp');
        $data->status = $request->get('status');
        $data->id_kelas = $request->get('id_kelas');
        // $data->user_id = $request->get('user_id');

            if($request->file('foto') != ""){

            if ($data->foto && file_exists(storage_path('app/public/'.$data->foto))) {
                \Storage::delete('   public/'.$data->foto);
            }

            $filename = $request->file('foto')->store('foto', 'public');
            $data->foto = $filename;

        }

        // $kelas = new Kelas;
        // $kelas->id = $request->get('id_kelas');

        // $data->kelas()->associate($kelas);
        $data->save();
        
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim)
    {
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index');
    }
}
