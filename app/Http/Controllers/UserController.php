<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Pengajar;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = User::where('id', $id)->first();
        $data->id = $request->get('id');
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = $request->get('password');


        $data->save();

        return redirect()->route('user.index')->with('success', 'User Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     */
    
    public function edit(string $id)
    {
        $User = User::find($id);
        return view('user.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'id' => 'required',
            'name' => 'required',
            // 'email' => 'required',
            // // 'password' => 'required',
            'role' => 'required',
        ]);

        $data = User::where('id', $id)->first();
        // $data->id = $request->get('id');
        $data->name = $request->get('name');
        // $data->email = $request->get('email');
        // $data->password = $request->get('password');
        $data->role = $request->get('role');


        $data->save();

        if($data){
            return redirect()->route('user.index')->with('success', 'User Berhasil Diupdate');
    
            }else{
                return redirect()->route('user.edit',$data->id)->with('error', 'User Gagal Di update');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');
    }
}
