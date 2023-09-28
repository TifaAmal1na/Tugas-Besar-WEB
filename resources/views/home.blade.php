@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-11 mt-1 mb-1">
        <div class="card">
                <div class="card-header py-3">
                    <div class="alert alert-dark">
                    <strong>Selamat Datang  {{ Auth::user()->name }} !</strong> <BR>
  Silahkan melihat pembaruan dari seluruh data </strong> 
</div>

<div class="row">
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                Total Tutor</div>
                {{ $pengajar }}
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                Total pengguna</div>

                {{ $mahasiswa }}
               <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                Data User</div>
                {{ $user }}
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100 py-2">
<div class="card-body">
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
               Transaksi</div>
               {{ $transaksi }}
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection