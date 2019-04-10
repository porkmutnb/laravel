@extends('layouts.layout')
@section('title', 'Facilities')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Edit Gender</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> {{ $gender['genderName'] }} </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>genderID</th>
                      <th>genderName</th>
                      <th>  </th>
                    </tr>
                  </thead>
                    <form action="{{ URL('gender/edit') }}" method="POST" enctype="multipart/form-data">
                        <tbody >
                            <tr>
                                <td>
                                    genderID 
                                    <input class="form-control" type="hidden" name="genderID" value="{!! $gender['genderID'] !!}" >
                                    <input class="form-control" type="text" name="genderID" value="{!! $gender['genderID'] !!}" disabled > 
                                </td>
                                <td>
                                    genderName
                                    <input class="form-control" type="text" name="genderName" value="{!! $gender['genderName'] !!}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary"> Save </button>
                                    <a class="btn btn-danger" onclick="formDelete({!! $gender['genderID'] !!})"> Delete </a>
                                </td>
                            </tr>
                            @if(isset($error))
                              <tr>
                                  <td colspan="4">
                                      <p style="text-align: center; color: red;"> {{ $error }} </p>
                                  </td>
                              </tr>
                            @endif
                        </tbody>
                        @csrf
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formDelete(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found genderID');
  }else{
    if (confirm('Are you sure Delete this gender??')) {
      window.location.href = "{{ URL('gender/delete') }}?id="+key;
    }
  }
}
</script>