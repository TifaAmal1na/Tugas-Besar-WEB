@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
<div class="card-header py-3">
    <div class="m-0 font-weight-bold text-primary">Inset Data Tutor</div>
</div>
<div class="card-body">

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<table>
		<form method="POST" action="{{ route('pengajar.store', $Pengajar->nip)}}">
        @csrf
        @method('PUT')
			<tr>
				<td> Nama: </td>
				<td> <input type="text" name="nama" class="form-control" id="nama" 
                            aria-describedby="nama"></td>
			</tr>
			<tr>
				<td> Email: </td>
				<td> <input type="text" name="email" class="form-control" id="email" 
                            aria-describedby="email"></td>
			</tr>
			<tr>
                <td> Telp: </td>
				<td> <input type="text" name="telp" class="form-control" id="telp" 
                            aria-describedby="telp"> </td>
                
			</tr>
			
			</tr>
       
			<tr>
            <td> status: </td>
				<td>
                <input type="radio" name="status_pengajar" id="status_pengajar" value="Aktif"> Aktif
                <input type="radio" name="status_pengajar" id="status_pengajar" value="Tidak Aktif"> Tidak
                </td>
			</tr>
			
				<td> <input type="submit" name="kirim" value="Kirim"> </td>
			</tr>
		</form>
	</table>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection