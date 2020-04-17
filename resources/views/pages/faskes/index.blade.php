@extends('layouts.sidebar')
@section('content')
<section class="section">
  <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
      </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="text-left col-sm-12 col-md-6 col-lg-6">
            <h4>Daftar Faskes</h4>
          </div>
          <div class="text-right col-sm-12 col-md-6 col-lg-6">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-plus"></i>
              Tambah Faskes
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="collapse" id="collapseExample">
          </div>
          <div class="table-responsive">
            <table class="table table-hover" id="datatable" style="width:100%; text-align:center">
              <thead>
                <tr class="text-center head_blue">
                  <th>No.</th>
                  <th>Kode Faskes</th>
                  <th>Nama Faskes</th>
                  <th>Kontak</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <footer>
                </footer>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  
@endsection
@push('stylesheet')
    <style>
      .action {
        display:flex;
        justify-content: center;
      }
      .action a{
        margin-left:4px;
        margin-right:4px
      }
      tr .text-center{
        
      }
    </style>
@endpush
@push('script_bottom')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
   $('#datatable').DataTable({
      // bFilter: false,
      scrollX: true,
        columnDefs: [ {
            searchable: false,
            orderable: false,
            targets: [0,4]
        }],
        order: [[ 1, 'asc' ]],        
        responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
        },
        responsive:false,
        processing: true,
        serverSide: true,
        ajax:        
        {
          url:"{{route('table.daftar.faskes')}}",
          type:'post'
        }, 
        columns: [
              {data:'DT_RowIndex', name: 'DT_RowIndex'},
              {data:'faske_kode',name:'faske_kode'},
              {data:'nama_faskes',name:'nama_faskes'},
              {data:'faskes_phone_number',name:'faskes_phone_number',searchable:false},
              {data:'action',name:'action',searchable:false}
        ],
    });    
});
</script>   
@endpush