@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Data User</div>
                    <div class="float-right">
                    <a href="" class=" btn btn-sm btn-primary shadow-sm"data-toggle="modal" data-target="#addModal">
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
                                    <th>id_admin</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                
                            </tfoot>
                            <tbody>
                            @foreach ($data as $User)
                        <tr>
                            <td>{{ $User->id }}</td>
                            <td>{{ $User->name }}</td>
                            <td>{{ $User->email }}</td>
                            <td>{{ $User->role }}</td>
                            <td>
                                <form action="{{ route('user.destroy',$User->id) }}" method="POST">
                                   
                                    <a class="btn btn-primary" href="{{ route('user.edit',$User->id) }}">Edit</a>
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

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tidak bisa melakukan add</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan lakukan register di halaman depan</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="">add</a>
                </div>
            </div>
        </div>
    </div>
            @endsection
            