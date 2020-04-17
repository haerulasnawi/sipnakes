@extends('layouts.sidebar')
@push('stylesheet')
    <style>
        p{
            margin-top: 0;
            margin-bottom: 0;
        }
        .col-5{
            padding: 0;
        }
        .col-1{
            padding-right: 0;
        }
    </style>
@endpush
@section('content')
<section class="section">
  <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
      </div>
  </div>
  <div class="section-body">
      <h2 class="section-title">Hi, {{ Auth::user()->first_name}} !</h2>
      {{-- <p class="section-lead">
        Change information about yourself on this page.
      </p> --}}

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">                     
              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-value">Active</div>
                </div>
                <div class="profile-widget-item">
                  <div class="badges"><span class="badge badge-success">1002 Hari Lagi</span></div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
              <div class="profile-widget-name">Puskesmas<div class="text-muted d-inline font-weight-normal"><div class="slash"></div>Fasket Tingkat Pertama</div></div>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="row">
                          <div class="col-5">
                              <p class="diskripsi"><i class="far fa-id-card"></i>&emsp; Nama Lengkap</p>
                          </div>
                          <div class="col-7">
                              <p class="diskripsi">:&emsp;{{Auth::user()->faske->nama_faskes}} </p>
                          </div>
                      </div>
                  </li>
                  <li class="list-group-item"><div class="row">
                      <div class="col-5">
                          <p class="diskripsi"><i class="fas fa-map-marked-alt"></i>&emsp;Alamat</p>
                      </div>
                      <div class="col-1">
                          :
                      </div>
                      <div class="col-6">
                          <p class="diskripsi">{{Auth::user()->faske->alamat}} </p>
                      </div>
                  </div></li>
                  <li class="list-group-item"><div class="row">
                      <div class="col-5">
                          <p class="diskripsi"><i class="fas fa-mobile-alt"></i>&emsp;Nomor kontak</p>
                      </div>
                      <div class="col-7">
                          <p class="diskripsi">:&emsp;{{Auth::user()->faske->faskes_phone_number}} </p>
                      </div>
                  </div></li>
                </ul>
            </div>
            <div class="card-footer text-center">
              {{-- <div class="font-weight-bold mb-2">Follow Ujang On</div>
              <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-github mr-1">
                <i class="fab fa-github"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-instagram">
                <i class="fab fa-instagram"></i>
              </a> --}}
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="">
              <div class="card">
                  <div class="card-header">
                      <div class="row" style="width:100%">
                          <div class="col-sm-12 col-md-12 col-lg-6">
                              <h4>Data Registrasi</h4>
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-6 text-right">
                              <div class="buttons">
                                  <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></a>
                              </div>                                
                          </div>
                      </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                          <tr>
                              <th>doc</th>
                              <th>Nomor</th>
                              <th>Created At</th>
                              <th>Expired At</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                              <td>STR</td>
                              <td>Irwansyah Saputra</td>
                              <td>2017-01-09</td>
                              <td>2017-01-09</td>
                              <td><div class="badge badge-success">Active</div></td>
                              <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </form>
          </div>
          <div class="card">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card">
                    <div class="card-header">
                      <div class="row" style="width:100%">
                          <div class="col-sm-12 col-md-12 col-lg-6">
                              <h4>Data Perizinan</h4>
                          </div>
                          <div class="col-sm-12 col-md-12 col-lg-6 text-right">
                              <div class="buttons">
                                  <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></a>
                              </div>                                
                          </div>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped table-md">
                          <tbody>
                            <tr>
                                <th>doc</th>
                                <th>Nomor</th>
                                <th>Created At</th>
                                <th>Faskes</th>
                                <th>Action</th>
                            </tr>
                                <td>SIP</td>
                                <td>Irwansyah Saputra</td>
                                <td>2017-01-09</td>
                                <td>UPT BLUD Puskesmas Penimbung</td>
                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                            </tr>                      
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
        </div>
      </div>    
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Basic DataTables</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="datatable" style="width:100%; text-align:center">
                <thead>
                  <tr class="text-center head_blue">
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Profesi</th>
                    <th>Gender</th>
                    <th>Progress</th>
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
    <div class="row mt-sm-4">
  </div>
</section>
@endsection
@push('script_bottom')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
  var t =  $('#datatable').DataTable({
        columnDefs: [ {
            searchable: false,
            orderable: false,
            targets: [0]
        }],
        order: [ 4, 'asc' ],        
        responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
        },
        responsive:true,
        processing: true,
        serverSide: true,
        ajax:        
        {
          url:"{{route('table.daftar.nakes')}}",
          type:'post',
        }, 
        columns: [
              {data:'DT_RowIndex', name: 'DT_RowIndex'},
              {data:'full_name',name:'nakes.full_name'},
              {data:'nama_jnakes',name:'nama_jnakes',searchable:false},
              {data:'gender',name:'nakes.gender'},
              {data:'progress',name:'istrs.str_mass'},
              {data:'action',name:'action',searchable:false}
        ],
    });
    t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
});
</script>   
@endpush