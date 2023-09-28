@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-2 mb-2">
            <div class="card">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">Riwayat Transaksi</div>
                    <div class="float-right">
                    <a href="{{route('transaksi.create')}}" class=" btn btn-sm btn-primary shadow-sm">
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
                                    <th>id_transaksi</th>
                                    <th>Kelas</th>
                                    <th>id_user</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                
                            </tfoot>
                            <tbody>
                            @foreach ($data as $Transaksi)

                        <tr>
                            <td>{{ $Transaksi->id}}</td>
                            <td>{{ $Transaksi->Kelas->nama}}</td>
                            <td>{{ $Transaksi->id_user }}</td>
                            <td>{{ $Transaksi->Tanggal }}</td>
                            <td>{{ $Transaksi->Total }}</td>
                            <td>{{ $Transaksi->Status }}</td>
                            <td>
                                <form action="{{ route('transaksi.destroy',$Transaksi->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('transaksi.cetak_pdf',$Transaksi->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('transaksi.edit',$Transaksi->id) }}">Edit</a>
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
            