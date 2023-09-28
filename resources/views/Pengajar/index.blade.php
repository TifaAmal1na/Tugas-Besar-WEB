@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Data Tutor</div>
                    <div class="float-right">
                    <a href="{{route('pengajar.create')}}" class=" btn btn-sm btn-primary shadow-sm">
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
                                    <th>id_tutor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                
                            </tfoot>
                            <tbody>
                            @foreach ($data as $Pengajar)
                        <tr>
                            <td>{{ $Pengajar->nip }}</td>
                            <td>{{ $Pengajar->nama }}</td>
                            <td>{{ $Pengajar->email }}</td>
                            <td>{{ $Pengajar->telp }}</td>
                            <td>{{ $Pengajar->status_pengajar }}</td>
                            <td>
                                <form action="{{ route('pengajar.destroy',$Pengajar->nip) }}" method="POST">
                                   
                                    <a class="btn btn-primary" href="{{ route('pengajar.edit',$Pengajar->nip) }}">Edit</a>
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
            