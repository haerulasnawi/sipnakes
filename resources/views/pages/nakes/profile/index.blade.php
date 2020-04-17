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
              <div class="profile-widget-name">{{Auth::user()->nake->full_name}}
                <div class="text-muted d-inline font-weight-normal">                  
                  @if(auth()->user()->nake->jnake_id!=null)
                  <div class="slash">
                  </div>
                    {{Auth::user()->nake->jnake->nama_jnakes}}
                  @endif
                </div>
              </div>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="row">
                          <div class="col-5">
                              <p class="diskripsi">
                                <i class="far fa-id-card"></i>
                                &emsp; Nama Lengkap
                              </p>
                          </div>
                          <div class="col-7">
                              <p class="diskripsi">:&emsp;{{Auth::user()->nake->full_name}} </p>
                          </div>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class="row">
                          <div class="col-5">
                              <p class="diskripsi">
                                <i class="fas fa-calendar-alt"></i>
                                &emsp;Tempat, tanggal lahir
                              </p>
                          </div>
                          <div class="col-7">
                              <p class="diskripsi">:&emsp;{{Auth::user()->nake->tgl_lahir}} </p>
                          </div>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <div class="row">
                          <div class="col-5">
                              <p class="diskripsi"><i class="fas fa-venus-mars"></i>&emsp;Jenis Kelamin</p>
                          </div>                        
                          <div class="col-6">
                              <p class="diskripsi">:&emsp;{{Auth::user()->nake->gender}} </p>
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
                          <p class="diskripsi">{{Auth::user()->nake->alamat}} </p>
                      </div>
                  </div></li>
                  <li class="list-group-item"><div class="row">
                      <div class="col-5">
                          <p class="diskripsi"><i class="fas fa-mobile-alt"></i>&emsp;Nomor kontak</p>
                      </div>
                      <div class="col-7">
                          <p class="diskripsi">:&emsp;{{Auth::user()->nake->nakes_phone_number}} </p>
                      </div>
                  </div></li>
                </ul>
            </div>
            <div class="card-footer text-center">
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
                                  <a href="#" class="btn btn-icon btn-primary">
                                    <i class="fas fa-plus"></i>
                                  </a>
                              </div>                                
                          </div>
                      </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md " id="str_datatable" style="width:100%; text-align:center">
                        <thead>
                          <tr class="text-center head_blue">
                            <th>doc</th>
                            <th>Nomor</th>
                            <th>Created At</th>
                            <th>Expired At</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr> 
                        </thead>
                        <tbody>                                                                      
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
                        <table class="table table-striped table-md " id="sip_datatable" style="width:100%; text-align:center">
                          <thead>
                            <tr class="text-center head_blue">
                              <th>doc</th>
                              <th>Nomor</th>
                              <th>Created At</th>
                              <th>Expired At</th>
                              <th>Status</th>
                            <th>Action</th>
                            </tr>   
                          </thead>
                          <tbody>                                             
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
    $('#str_datatable').DataTable({
        bFilter: false,
        bInfo:false,
        bPaginate:false,
        bLengthChange: false,
          columnDefs: [ {
              searchable: false,
              orderable: false,
              targets: [0,1,2,3,]
          }],
          responsive:false,
          processing: true,
          serverSide: true,
          ajax:        
          {
            url:"{{route('table.str')}}",
            type:'post'
          }, 
          columns: [
                {data:'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'str_nomor',name:'str_nomor'},
                {data:'str_terbit',name:'str_terbit'},
                {data:'str_exp',name:'str_exp'},
                {data:'status',name:'status'},
                {data:'action',name:'id',searchable:false}
          ],
      });
      $('#sip_datatable').DataTable({
        bFilter: false,
        bInfo:false,
        bPaginate:false,
        bLengthChange: false,
          columnDefs: [ {
              searchable: false,
              orderable: false,
              targets: [0,1,2,3,]
          }],
          responsive:false,
          processing: true,
          serverSide: true,
          ajax:        
          {
            url:"{{route('table.str')}}",
            type:'post'
          }, 
          columns: [
                {data:'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'str_nomor',name:'str_nomor'},
                {data:'str_terbit',name:'str_terbit'},
                {data:'str_exp',name:'str_exp'},
                {data:'status',name:'status'},
                {data:'action',name:'id',searchable:false}
          ],
      });
  });
  </script>
@endpush