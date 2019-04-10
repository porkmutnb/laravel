@extends('layouts.layout')
@section('title', 'Station')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Station - NearBy</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Station - NearBy</h6>
            </div>
            <div class="card-body">
              <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="formAdd()"> Add </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>StationID</th>
                      <th>StationHead</th>
                      <th>StationName</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($stations)>0)
                      @foreach($stations as $key => $station)
                        <tr>
                            <td> 
                                {{ $key + 1 }}
                            </td>
                            <td> {{ $station->stationHead }} </td>
                            <td> {{ $station->stationName }} </td>
                            <td>
                                <a class="btn btn-success" onclick="formEdit({!! $station->stationID !!})"> Edit </a>
                                <a class="btn btn-danger" onclick="formDelete({!! $station->stationID !!})"> Delete </a>
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
                {{ $stations->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formAdd() {
    window.location.href = "{{ URL('nearby/station/add') }}";
}
function formEdit(key) {
    if(key==undefined) {
        alert('Something went wrong!!! Please try again');
        console.log('not found stationID');
    }else{
        if (confirm('Are you sure Edit this stationID??')) {
            window.location.href = "{{ URL('nearby/station/edit') }}?id="+key;
        }
    }
}
function formDelete(key) {
    if(key==undefined) {
        alert('Something went wrong!!! Please try again');
        console.log('not found stationID');
    }else{
        if (confirm('Are you sure Delete this station??')) {
            window.location.href = "{{ URL('nearby/station/delete') }}?id="+key;
        }
    }
}
</script>