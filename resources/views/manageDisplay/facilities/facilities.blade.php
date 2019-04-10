@extends('layouts.layout')
@section('title', 'Facilities')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Facilities</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Facilities</h6>
            </div>
            <div class="card-body">
              <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="formAdd()"> Add </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>FacilitiesID</th>
                      <th>FacilitiesName</th>
                      <th>FacilitiesImage</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($facilities)>0)
                      @foreach($facilities as $key => $facilitie)
                        <tr>
                          <td id="facilitieID{!! $key !!}"> {{ $key + 1 }} </td>
                          <td id="facilitieName{!! $key !!}"> {{ $facilitie->facilitieName }} </td>
                          <td>
                            @if($facilitie->facilitieImage==null)
                                <img class="img-profile rectangle mt-2" width="50" src="{{ URL('img/not-found.png') }}"> 
                            @else
                                <img class="img-profile rectangle mt-2" id="facilitieImage{!! $key !!}" width="50" src="{{ URL('/') }}/{!! $facilitie->facilitieImage !!}">
                            @endif
                          </td>
                          <td>
                            <a class="btn btn-success" onclick="formEdit({!! $facilitie->facilitieID !!})"> Edit </a>
                            <a class="btn btn-danger" onclick="formDelete({!! $facilitie->facilitieID !!})"> Delete </a>
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
                {{ $facilities->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formAdd() {
  window.location.href = "{{ URL('facilities/add') }}";
}
function formEdit(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found facilitieID');
  }else{
    if (confirm('Are you sure Edit this facilitie??')) {
      window.location.href = "{{ URL('facilities/edit') }}?id="+key;
    }
  }
}
function formDelete(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found facilitieID');
  }else{
    if (confirm('Are you sure Delete this facilitie??')) {
      window.location.href = "{{ URL('facilities/delete') }}?id="+key;
    }
  }
}
</script>