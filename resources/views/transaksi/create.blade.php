@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
<div class="card-header py-3">
    <div class="m-0 font-weight-bold text-primary">Inset Data Transaksi</div>
</div>
<div class="card-body">

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<table>
<form method="POST" action="{{ route('transaksi.store') }}" id="myForm" enctype="multipart/form-data">
        @csrf
				<tr>
					<td> id_transaksi: </td> 
					<td> <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" 
                            aria-describedby="id_transaksi"></td>
				</tr>
                <tr>
					<td> id_kelas: </td> 
					<td> <select name="id_kelas" id="id_kelas">
                            @foreach ($kelas as $Kelas)
                            <option value="{{$Kelas->id}}">{{$Kelas->id}} - {{$Kelas->nama}}</option>
                            @endforeach
				</tr>
                <tr>
					<td> id_user: </td> 
					<td> <select name="id_user" id="id_user">
                            @foreach ($mahasiswa as $Mahasiswa)
                            <option value="{{$Mahasiswa->nim}}">{{$Mahasiswa->nim}} - {{$Mahasiswa->nama}}</option>
                            @endforeach

				</td>

				</tr>
			<tr>
                <td> Tanggal: </td>
				<td> <input type="datetime" name="Tanggal" class="form-control" id="Tanggal" 
                            aria-describedby="Tanggal"> </td>
                
			</tr>
			<tr>
                <td> Total: </td>
				<td> <input type="text" name="Total" class="form-control" id="Total" 
                            aria-describedby="Total"> </td>
                
			</tr>
       
			<tr>
            <td> status: </td>
				<td>
                <input type="radio" name="Status" id="Status" value="Lunas"> Lunas
                <input type="radio" name="Status" id="Status" value="Menunggu"> Menunggu
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