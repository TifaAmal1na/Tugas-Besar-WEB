@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Data Pengguna</div>
                    <div class="float-right">
                    <a href="{{route('mahasiswa.create')}}" class=" btn btn-sm btn-primary shadow-sm">
                        <!-- <i class="fas fa-download fa-sm text-white-50"></i>  -->
                        ADD</a>
                    <!-- <a href="tables.php?page=formInsertPengguna" class=" btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-download fa-sm text-white-50"></i>  -->
                        <!-- ADD</a> -->
                    </div>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id_user</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>id_kelas</th>
                                    <th>Status</th>
                                    <th>id_user</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                
                            </tfoot>
                            <tbody>
                            @foreach ($data as $Mahasiswa)
                        <tr>
                            <td>{{ $Mahasiswa->nim }}</td>
                            <td>{{ $Mahasiswa->nama }}</td>
                            <td>@if(isset($Mahasiswa->foto))
                                <img src="{{asset('storage/'.$Mahasiswa->foto)}}" alt="foto profile" style="height: 100px; width: 100px; overflow: hidden; object-fit: cover;"></td>
                                @else
                                no-image
                                @endif
                            <td>{{ $Mahasiswa->email }}</td>
                            <td>{{ $Mahasiswa->telp }}</td>
                            <td>{{ $Mahasiswa->id_kelas }}</td>
                            <td>{{ $Mahasiswa->status }}</td>
                            <td>{{ $Mahasiswa->user_id }}</td>
                            <td>
                                <form action="{{ route('mahasiswa.destroy',$Mahasiswa->nim) }}" method="POST">
                                   
                                    <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            @endsection
            