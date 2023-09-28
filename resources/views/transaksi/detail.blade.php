@extends('transaksi.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Transaksi
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>id: 
                        </b>{{$data->id}}</li>
                    <li class="list-group-item"><b>id_kelas:
                        </b>{{$data->Kelas->nama}}</li>
                    <li class="list-group-item"><b>id_user:
                        </b>{{$data->id_user}}</li>
                    <li class="list-group-item"><b>No_Handphone:
                        </b>{{$data->Total}}</li>
                    <li class="list-group-item"><b>Email:
                        </b>{{$data->Status}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection