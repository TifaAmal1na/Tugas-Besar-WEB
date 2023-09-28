<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Pengajar;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::get();
        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Transaksi::get();
        $mahasiswa = Mahasiswa::get();
        $kelas = Kelas::get();
        return view('transaksi.create', compact('data','mahasiswa','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'id_transaksi' => 'required',
        //     'id_kelas' => 'required',
        //     'id_user' => 'required',
        //     'Tanggal' => 'required',
        //     'Total' => 'required',
        //     'status' => 'required',
        // ]);

        $data = new Transaksi;
        $data->id = $request->get('id_transaksi');
        $data->id_kelas = $request->get('id_kelas');
        $data->id_user = $request->get('id_user');
        $data->Tanggal = $request->get('Tanggal');
        $data->Total = $request->get('Total');
        $data->status = $request->get('Status');


        $data->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_transaksi)
    {
        $data = Transaksi::find($id_transaksi);
        return view('transaksi.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_transaksi)
    {
        $Transaksi = Transaksi::find($id_transaksi);   
        return view('transaksi.edit', compact('Transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_transaksi)
    {
        // $request->validate([
        //     'id_transaksi' => 'required',
        //     'id_kelas' => 'required',
        //     'id_user' => 'required',
        //     'Tanggal' => 'required',
        //     'Total' => 'required',
        //     'status' => 'required',
        // ]);

        $data = Transaksi::where('id', $id_transaksi)->first();
        // $data->id = $request->get('id_transaksi');
        $data->id_kelas = $request->get('id_kelas');
        $data->id_user = $request->get('id_user');
        $data->Tanggal = $request->get('Tanggal');
        $data->Total = $request->get('Total');
        $data->status = $request->get('Status');

        $data->save();

        
        if($data){
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Diupdate');
    
            }else{
                return redirect()->route('transaksi.edit',$data->id_transaksi)->with('error', 'Transaksi Gagal Di update');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_transaksi)
    {
        Transaksi::find($id_transaksi)->delete();
        return redirect()->route('transaksi.index');
    }
    

    public function cetak_pdf(string $id_transaksi){
        $transaksi = Transaksi::find($id_transaksi);
        $pdf = PDF::loadView('transaksi.detail', ['data'=>$transaksi]);
        return $pdf->stream();
    }

}
