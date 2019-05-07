@extends('layouts.layout')
@section('title', 'Member')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Member</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Member</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>UserID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>BirthDate</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Evidence</th>
                        <th>  </th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(count($users)>0)
                            @foreach($users as $key => $user)
                                <tr>
                                    <td > 
                                        {{ $key + 1 }}
                                    </td>
                                    <td> 
                                        {{ $user['username'] }} 
                                    </td>
                                    <td> 
                                        {{ $user['email'] }} 
                                    </td>
                                    <td> 
                                        {{ $user['birthdate'] }} 
                                    </td>
                                    <td> 
                                        {{ $user['genderName'] }} 
                                    </td>
                                    <td>
                                        @if($user['imagePath']==null)
                                            <img class="img-profile rectangle mt-2" width="50" src="{{ URL('img/not-found.png') }}"> 
                                        @else
                                            <img class="img-profile rectangle mt-2" id="facilitieImage{!! $key !!}" width="50" src="{{ URL('/') }}/{!! $user['imagePath'] !!}">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user['status'] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-success" onclick="formEdit({!! $user['userID'] !!})"> Edit </a>
                                        <a class="btn btn-danger" onclick="formDelete({!! $user['userID'] !!})"> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                              <td colspan="9" align="center"> ไม่มีข้อมูล </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
<script>
function formEdit(uid) {
    console.log(uid);
}
function function(uid) {
    console.log(uid);
}
</script>