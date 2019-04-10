@extends('layouts.layout')
@section('title', 'Province')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Province - NearBy</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Province - NearBy</h6>
            </div>
            <div class="card-body">
              <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="formAdd()"> Add </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>provinceID</th>
                      <th>provinceName</th>
                      <th>amphurName</th>
                      <th>districtName</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($provinces)>0)
                      @foreach($provinces as $key => $province)
                        <tr>
                            <td> 
                                {{ $key + 1 }}
                            </td>
                            <td> {{ $province->provinceName }} </td>
                            <td> {{ $province->districtName }} </td>
                            <td> {{ $province->amphurName }} </td>
                            <td>
                                <a class="btn btn-success" onclick="formEdit({!! $province->provinceID !!},{!! $province->districtID !!},{!! $province->amphurID !!})"> Edit </a>
                                <a class="btn btn-danger" onclick="formDelete({!! $province->provinceID !!},{!! $province->districtID !!},{!! $province->amphurID !!})"> Delete </a>
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
                {{ $provinces->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formAdd() {
    window.location.href = "{{ URL('nearby/province/add') }}";
}
function formEdit(proId,disId,ampId) {
    if(proId==undefined||disId==undefined||ampId==undefined) {
        alert('Something went wrong!!! Please try again');
        console.log('not found provinceID');
    }else{
        if (confirm('Are you sure Edit this province??')) {
            window.location.href = "{{ URL('nearby/province/edit') }}?proId="+proId+"&disId="+disId+"&ampId="+ampId;
        }
    }
}
function formDelete(proId,disId,ampId) {
    if(proId==undefined||disId==undefined||ampId==undefined) {
        alert('Something went wrong!!! Please try again');
        console.log('not found provinceID');
    }else{
        if (confirm('Are you sure Delete this province??')) {
            window.location.href = "{{ URL('nearby/province/delete') }}?proId="+proId+"&disId="+disId+"&ampId="+ampId;
        }
    }
}
</script>