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
            <h4>Daftar Nakes</h4>
          </div>
          <div class="text-right col-sm-12 col-md-6 col-lg-6">
            <a class="btn btn-primary pull-right modal-show" href="{{route('nakes.create')}}" title="Create Nakes">
              <i class="fas fa-plus"></i>
              Tambah Nakes
            </a>
            <a class="btn .btn-outline-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-search"></i>
              Pencarian
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="collapse" id="collapseExample">
            <form id="search_form">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="status">Status Nakes</label>
                <select name="status" id="status" class="form-control">              
                  <option value="">==Pilih Status Nakes==</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                  <option value="3">Belum Verifikasi</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" placeholder="Cari NIK">
              </div>
              <div class="form-group col-md-3">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" placeholder="Cari NIP">
              </div>
              <div class="form-group col-md-3">
                <label for="full_name">Nama</label>
                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Cari Nama">
              </div>
            </div>
            <div class="form-row">            
              <div class="form-group col-md-2">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="">==Pilih Jenis Kelamin==</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="status">Profesi</label>
                <select name="status" id="status" class="form-control">              
                  <option value="">==Pilih Profesi==</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                  <option value="3">Belum Verifikasi</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="full_name">Faskes</label>
                <select name="full_name" id="full_name" class="form-control">              
                  <option value="">==Pilih Faskes==</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak Aktif</option>
                  <option value="3">Belum Verifikasi</option>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Cari Berdasatkan Alamat"></textarea>
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
          </div>
          <div class="table-responsive">
            @if (Auth::user()->role=='admin')
            <table class="table table-hover" id="admin_datatable" style="width:150%; text-align:center">
            @else
            <table class="table table-hover" id="datatable" style="width:150%; text-align:center">
            @endif
              <thead>
                <tr class="text-center head_blue">
                  <th>No.</th>
                  <th>NIK</th>
                  <th>NIP</th>
                  <th>Nama Lengkap</th>
                  <th>Gelar</th>
                  <th>Gender</th>
                  <th>Profesi</th>
                  <th>Kontak</th>
                  @if (Auth::user()->role=='admin')
                      <th>Faskes</th>
                  @endif
                  <th>Status</th>
                  <th>Masa Aktif</th>
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
  var admin= document.getElementById("admin_datatable");
  
  if (admin) {
    var t =  $('#admin_datatable').DataTable({
      bFilter: false,
      scrollX: true,
        columnDefs: [ {
            searchable: false,
            orderable: false,
            targets: [0,11]
        }],
        order: [[ 10, 'asc' ]],        
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
          url:"{{route('table.daftar.nakes')}}",          
          data:function(d){
            d.status=$('#status').val();
            d.nik=$('#nik').val();
            d.full_name=$('#full_name').val();
            d.gender=$('#gender').val();
          }
        }, 
        columns: [
              {data:'DT_RowIndex', name: 'DT_RowIndex'},
              {data:'nik',name:'nik'},
              {data:'nip',name:'nip'},
              {data:'full_name',name:'full_name'},
              {data:'gelar',name:'nakes.gelar',searchable:false},
              {data:'gender',name:'gender'},
              {data:'nama_jnakes',name:'jnakes.nama_jnakes',searchable:false},
              {data:'nakes_phone_number',name:'nakes.nakes_phone_number'},
              {data:'nama_faskes',nama:'faskes.nama_faskes'},
              {data:'status',name:'istrs.str_ket'},
              {data:'progress',name:'istrs.str_mass',searchable:false},
              {data:'action',name:'action',searchable:false}
        ],
    });
  }
  else
  {
    var t =  $('#datatable').DataTable({
      bFilter: false,
      scrollX: true,
        columnDefs: [ {
            searchable: false,
            orderable: false,
            targets: [0,10]
        }],
        order: [[ 8, 'asc' ]],        
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
          url:"{{route('table.daftar.nakes')}}",
          type:'post',
          data:function(d){
            d.status=$('#status').val();
            d.nik=$('#nik').val();
            d.full_name=$('#full_name').val();
            d.gender=$('#gender').val();
          }
        }, 
        columns: [
              {data:'DT_RowIndex', name: 'DT_RowIndex'},
              {data:'nik',name:'nik'},
              {data:'nip',name:'nip'},
              {data:'full_name',name:'full_name'},
              {data:'gelar',name:'nakes.gelar',searchable:false},
              {data:'gender',name:'gender'},
              {data:'nama_jnakes',name:'jnakes.nama_jnakes',searchable:false},
              {data:'nakes_phone_number',name:'nakes.nakes_phone_number'},
              {data:'status',name:'istrs.str_ket'},
              {data:'progress',name:'istrs.str_mass',searchable:false},
              {data:'action',name:'action',searchable:false}
        ],
    });
  }
  $('#search_form').on('submit',function(e){
      t.draw();
      e.preventDefault();
    });
    $('#search_form').on('reset',function(e){
      $('#status').val('');
      $('#nik').val('');
      $('#full_name').val('');
      $('#gender').val('');
      t.draw();
      e.preventDefault();
    });
    
});
</script>   
@endpush