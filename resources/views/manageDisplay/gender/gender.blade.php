@extends('layouts.layout')
@section('title', 'Gender')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Gender</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Gender</h6>
            </div>
            <div class="card-body">
              <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="formAdd()"> Add </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>genderID</th>
                      <th>genderName</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($genders)>0)
                      @foreach($genders as $key => $gender)
                        <tr>
                          <td id="genderID{!! $key !!}"> {{ $key + 1 }} </td>
                          <td id="genderName{!! $key !!}"> {{ $gender->genderName }} </td>
                          <td>
                            <a class="btn btn-success" onclick="formEdit({!! $gender->genderID !!})"> Edit </a>
                            <a class="btn btn-danger" onclick="formDelete({!! $gender->genderID !!})"> Delete </a>
                          </td>
                        </tr>
                      @endforeach
                    @else
                        <tr>
                          <td colspan="4" align="center"> ไม่มีข้อมูล </td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                {{ $genders->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formAdd() {
  window.location.href = "{{ URL('gender/add') }}";
}
function formEdit(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found genderID');
  }else{
    if (confirm('Are you sure Edit this gender??')) {
      window.location.href = "{{ URL('gender/edit') }}?id="+key;
    }
  }
}
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