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
            <h4>Daftar Persyaratan</h4>
          </div>
          <div class="text-right col-sm-12 col-md-6 col-lg-6">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-plus"></i>
              Tambah Persyaratan
            </a>
          </div>
        </div>
        <div class="card-body">
            <form id="search_form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="jnakes">Jenis Nakes</label>
                <select name="jnakes" id="jnakes" class="form-control">              
                  <option value="">==Pilih Jenis Nakes==</option>
                  @foreach ($jnakes as $jnakes)
                    <option value="{{$jnakes->nama_jnakes}}">{{$jnakes->nama_jnakes}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="nama_persyaratan">Nama Persyaratan</label>
                <input type="text" name="nama_persyaratan" id="nama_persyaratan" class="form-control" placeholder="Cari Persyaratan">
              </div>
            </div>
            <div class="form-row">
              <div class="col-12">
                <div class="card-footer text-right">
                  <button id="cari" class="btn btn-primary btn-lg" type="submit">Cari</button>
                  <button id="reset" class="btn btn-warning btn-lg" type="reset">Reset</button>
                </div>
              </div>
            </div>
          </form> 
          <div class="table-responsive">
            <table class="table table-hover" id="datatable" style="width:100%; text-align:center">
              <thead>
                <tr class="text-center head_blue">
                  <th>No.</th>
                  <th>Jenis Nakes</th>
                  <th>Nama Persyaratan</th>
                  <th>Link Persyaratan</th>
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
    var t =  $('#datatable').DataTable({
      bFilter: false,
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
          type:'post',
          url:"{{route('table.persyaratan')}}",          
          data:function(d){
            d.jnakes=$('#jnakes').val();
            d.nama_persyaratan=$('#nama_persyaratan').val();
          }
        }, 
        columns: [
              {data:'DT_RowIndex', name: 'DT_RowIndex'},
              {data:'nama_jnakes',name:'jnakes.nama_jnakes'},
              {data:'nama_persyaratan',nama:'nama_persyaratan'},
              {data:'persyaratan_link',name:'persyaratan_link'},
              {data:'action',name:'action',searchable:false}
        ],
    });
  $('#search_form').on('submit',function(e){
      t.draw();
      e.preventDefault();
    });
    $('#search_form').on('reset',function(e){
      $('#jnakes').val('');
      $('#nama_persyaratan').val('');
      t.draw();
      e.preventDefault();
    });
    
});
</script>   
@endpush