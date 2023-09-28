<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use App\Models\Pengajar;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengajar = Pengajar::get()->count();
        $mahasiswa = Mahasiswa::get()->count();
        $user = User::get()->count();
        $transaksi = Transaksi::get()->count();

        return view('home', compact('pengajar','mahasiswa','user','transaksi'));
        // return view('home');
    }
}
