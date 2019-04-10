@extends('layouts.layout')
@section('title', 'School')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">School - NearBy</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">School - NearBy</h6>
            </div>
            <div class="card-body">
              <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="formAdd()"> Add </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SchoolID</th>
                      <th>SchoolHead</th>
                      <th>SchoolName</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($schools)>0)
                      @foreach($schools as $key => $school)
                        <tr>
                            <td> 
                                {{ $key + 1 }}
                            </td>
                            <td> {{ $school->schoolHead }} </td>
                            <td> {{ $school->schoolName }} </td>
                            <td>
                                <a class="btn btn-success" onclick="formEdit({!! $school->schoolID !!})"> Edit </a>
                                <a class="btn btn-danger" onclick="formDelete({!! $school->schoolID !!})"> Delete </a>
                            </td>
                        </tr>
                      @endforeach
                    @else
                        <tr>
                          <td colspan="5" align="center"> ไม่มีข้อมูล </td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                {{ $schools->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formAdd() {
    window.location.href = "{{ URL('nearby/school/add') }}";
}
function formEdit(key) {
    if(key==undefined) {
        alert('Something went wrong!!! Please try again');
        console.log('not found schoolID');
    }else{
        if (confirm('Are you sure Edit this schoolID??')) {
            window.location.href = "{{ URL('nearby/school/edit') }}?id="+key;
        }
    }
}
function formDelete(key) {
    if(key==undefined) {
        alert('Something went wrong!!! Please try again');
        console.log('not found schoolID');
    }else{
        if (confirm('Are you sure Delete this school??')) {
            window.location.href = "{{ URL('nearby/school/delete') }}?id="+key;
        }
    }
}
</script>