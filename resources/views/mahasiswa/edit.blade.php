@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
<div class="card-header py-3">
    <div class="m-0 font-weight-bold text-primary">Edit Data Pengguna</div>
</div>
<div class="card-body">

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

<table>
		<form method="POST"  enctype="multipart/form-data" action="{{ route('mahasiswa.update', $Mahasiswa->nim)}}">
        @csrf
        @method('PUT')
				<tr>
					<td> nim: </td> 
					<td> <input type="text" name="nim" class="form-control" id="nim" value="{{$Mahasiswa->nim}}"
                            aria-describedby="nim" disabled></td>
				</tr>
			<tr>
				<td> Nama: </td>
				<td> <input type="text" name="nama" class="form-control" id="nama" value="{{$Mahasiswa->nama}}"
                            aria-describedby="nama"></td>
			</tr>
            <tr>
            <div class="form-group">
                    <td> <label for="foto">Foto</label></td>
                    <td> <input type="file" class="form-control" name="foto" value="{{$Mahasiswa->foto}}" placeholder="{{$Mahasiswa->foto}}"></br>
                        <img src="{{asset('storage/'.$Mahasiswa->foto)}}" alt="foto profile" style="height: 100px; width: 100px; overflow: hidden; object-fit: cover;"></td>
                    </div>
                </tr>
			<tr>
				<td> Email: </td>
				<td> <input type="text" name="email" class="form-control" id="email" value="{{$Mahasiswa->email}}"
                            aria-describedby="email"></td>
			</tr>
			<tr>
                <td> Telp: </td>
				<td> <input type="text" name="telp" class="form-control" id="telp" value="{{$Mahasiswa->telp}}"
                            aria-describedby="telp"> </td>
                
			</tr>
			<td> Id_kelas: </td>
			<td> <select name="id_kelas" id="id_kelas">
                            <option value="{{$Mahasiswa->id_kelas}}">{{$Mahasiswa->id_kelas}}</option>
                @foreach ($kelas as $Kelas)
                            <option value="{{$Kelas->id}}">{{$Kelas->id}} - {{$Kelas->nama}}</option>
                            @endforeach
				</td>
			</tr>
       
			<tr>
            <td> status: </td>
				<td>
                @if($Mahasiswa->status == 'Aktif')
                <input type="radio" name="status" id="status" value="Aktif" checked> Aktif 
                @else
                <input type="radio" name="status" id="status" value="Aktif"> Aktif
                @endif

                @if($Mahasiswa->status== 'Tidak Aktif')
				<input type="radio" name="status" id="status" value="Tidak Aktif" checked>Tidak</td>
                @else
                <input type="radio" name="status" id="status" value="Tidak Aktif"> Tidak
                @endif
                </td>
			</tr>

            <tr>
                <td> user_id: </td>
				<td> <input type="text" name="user_id" class="form-control" id="user_id" value="{{$Mahasiswa->user_id}}"
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