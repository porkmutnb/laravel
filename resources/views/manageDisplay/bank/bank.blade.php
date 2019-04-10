@extends('layouts.layout')
@section('title', 'Bank')
@section('breadcrumb')
    <h1 class="h3 mb-0 text-gray-800">Bank</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bank</h6>
            </div>
            <div class="card-body">
              <button class="btn btn-primary" style="margin-bottom: 15px;" onclick="formAdd()"> Add </button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>BankID</th>
                      <th>BankName</th>
                      <th>BankImage</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($banks)>0)
                      @foreach($banks as $key => $bank)
                        <tr>
                          <td id="bankAccountID{!! $key !!}"> {{ $key + 1 }} </td>
                          <td id="bankAccountName{!! $key !!}"> {{ $bank->bankAccountName }} </td>
                          <td>
                            @if($bank->bankAccountImage==null)
                                <img class="img-profile rectangle mt-2" width="50" src="{{ URL('img/not-found.png') }}"> 
                            @else
                                <img class="img-profile rectangle mt-2" id="facilitieImage{!! $key !!}" width="50" src="{{ URL('/') }}/{!! $bank->bankAccountImage !!}">
                            @endif
                          </td>
                          <td>
                            <a class="btn btn-success" onclick="formEdit({!! $bank->bankAccountID !!})"> Edit </a>
                            <a class="btn btn-danger" onclick="formDelete({!! $bank->bankAccountID !!})"> Delete </a>
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
                {{ $banks->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
<script>
function formAdd() {
  window.location.href = "{{ URL('bank/add') }}";
}
function formEdit(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found bankAccountID');
  }else{
    if (confirm('Are you sure Edit this bankAccount??')) {
      window.location.href = "{{ URL('bank/edit') }}?id="+key;
    }
  }
}
function formDelete(key) {
  if(key==undefined) {
    alert('Something went wrong!!! Please try again');
    console.log('not found bankAccountID');
  }else{
    if (confirm('Are you sure Delete this bankAccount??')) {
      window.location.href = "{{ URL('bank/delete') }}?id="+key;
    }
  }
}
</script>