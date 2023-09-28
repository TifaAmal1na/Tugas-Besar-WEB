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
<form method="POST" action="{{ route('user.update', $User->id)}}" id="myForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
			<tr>
				<td> username: </td>
				<td> <input type="text" name="name" class="form-control" id="name" value="{{$User->name}}"></td>
			</tr>
            <tr>
				<td> role: </td>
				<td> 
                @if($User->role == 'user')
                <input type="radio" name="role" id="role" value="user" checked> user 
                @else
                <input type="radio" name="role" id="role" value="user"> user
                @endif

                @if($User->role== 'admin')
				<input type="radio" name="role" id="role" value="admin" checked>admin</td>
                @else
                <input type="radio" name="role" id="role" value="admin"> admin
                @endif

                </td>


			</tr>
				</td>
			</tr>
			<tr>
           
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