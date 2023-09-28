@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
    <div class="card-header py-3">
        <div class="m-0 font-weight-bold text-primary">Input Data Pengguna</div>
    </div>
    <div class="card-body">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
        <table>
		<form method="POST" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
        @csrf

				<tr>
					<td> nim: </td> 
					<td> <input type="text" name="nim" class="form-control" id="nim"></td>
				</tr>
			<tr>
				<td> Nama: </td>
				<td> <input type="text" name="nama" class="form-control" id="nama"
                            aria-describedby="nama"></td>
			</tr>
            <tr>
            <td> <div class="form-group"></td>
                       <td> <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" required="required"></td>
                    </div>
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
			<td> Id_kelas: </td>
			<td> <select name="id_kelas" id="id_kelas">
                @foreach ($kelas as $Kelas)
                            <option value="{{$Kelas->id}}">{{$Kelas->id}} - {{$Kelas->nama}}</option>
                            @endforeach
				</td>
			</tr>
       
			<tr>
            <td> status: </td>
				<td>
                <input type="radio" name="status" id="status" value="Aktif"> Aktif
                <input type="radio" name="status" id="status" value="Tidak Aktif"> Tidak
                </td>
			</tr>

            <tr>
                <td> user_id: </td>
				<td> <input type="text" name="user_id" class="form-control" id="user_id" 
                            aria-describedby="user_id"> </td>
                
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