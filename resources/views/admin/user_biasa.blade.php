@extends('layouts.content_frame')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Basic DataTables</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr class="text-center">
                <th >
                  #
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <td>
                  1
                </td>
                <td>Create a mobile app</td>
                
                <td>EXAMPLE@EMAIL.COM</td>
                <td>
                  <div class="badge badge-success">2018-01-20</div>
                </td>
                <td>
                  {{-- <div> --}}
                    <a href="#" class="btn btn-icon btn-secondary"><i class="far fa-eye"></i></a>
                    <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></i></a>
                  {{-- </div> --}}
                </td>
              </tr>              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection
@push('script_top')
    <style>

    </style>
@endpush
@push('script_bottom')
<script>
  $(document).ready( function () {
    $('#table-1').DataTable();
    var versionNo = $.fn.dataTable.version;
    alert(versionNo);
  });
</script>    
@endpush