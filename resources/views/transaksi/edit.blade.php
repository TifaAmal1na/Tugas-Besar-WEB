@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
<div class="card-header py-3">
    <div class="m-0 font-weight-bold text-primary">Edit Data Transaksi</div>
</div>
<div class="card-body">

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<table>
		<form method="POST" action="{{ route('transaksi.update', $Transaksi->id)}}">
        @csrf
        @method('PUT')
				<tr>
					<td> id_transaksi: </td> 
					<td> <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" value="{{$Transaksi->id}}"
                            aria-describedby="id_transaksi" disabled></td>
				</tr>
                <tr>
					<td> id_kelas: </td> 
					<td> <input type="text" name="id_kelas" class="form-control" id="id_kelas" value="{{$Transaksi->id_kelas}}"
                            aria-describedby="id_kelas" ></td>
                            
				</tr>
                <tr>
					<td> id_user: </td> 
					<td> <input type="text" name="id_user" class="form-control" id="id_user" value="{{$Transaksi->id_user}}"
                            aria-describedby="id_user" ></td>
				</tr>
			<tr>
                <td> Tanggal: </td>
				<td> <input type="datetime" name="Tanggal" class="form-control" id="Tanggal" value="{{$Transaksi->Tanggal}}"
                            aria-describedby="Tanggal"> </td>
                
			</tr>
			<tr>
                <td> Total: </td>
				<td> <input type="text" name="Total" class="form-control" id="Total" value="{{$Transaksi->Total}}"
                            aria-describedby="Total"> </td>
                
			</tr>
       
			<tr>
            <td> status: </td>
				<td>
                @if($Transaksi->Status == 'Lunas')
                <input type="radio" name="Status" id="Status" value="Lunas" checked> Lunas 
                @else
                <input type="radio" name="Status" id="Status" value="Lunas"> Lunas
                @endif

                @if($Transaksi->Status== 'Menunggu')
				<input type="radio" name="Status" id="Status" value="Menunggu" checked>Menunggu</td>
                @else
                <input type="radio" name="Status" id="Status" value="Menunggu"> Menunggu
                @endif
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