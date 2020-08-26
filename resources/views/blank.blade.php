@extends('layouts.sidebar')
@section('content')
<section class="section" id="dashboard">
    <div class="section-header">
        <h1>Profile</h1>
    </div>
    <div class="row">
        <div id="authheader" class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
        <div id="dataidentitas">
            <div class="alert alert-success">
                <div class="alert-title">Klaim Berhasil <span class="badge badge-transparent"><i class="fas fa-check"></i></span></div>
                Mohon menunggu persetujuan klaim data! 
              </div>
            <div class="card author-box card-primary">
                <div class="card-body">
                    {{-- <div class="author-box-left">
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                    </div> --}}
                    {{-- <div class="author-box-details"> --}}
                    <div class="author-box-description">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-5">
                                    <p class="diskripsi">
                                    Nama 
                                    </p>
                                </div>
                                <div class="col-7">
                                    <p class="diskripsi" id="Nama">: {{$model->Nama}} </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-5">
                                    <p class="diskripsi">Profesi</p>
                                </div>
                                <div class="col-7">
                                    <p class="diskripsi" id="Profesi">: {{$model->Profesi}} </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-5">
                                    <p class="diskripsi">Status Registrasi</p>
                                </div>                        
                                <div class="col-7">
                                    <p class="diskripsi" id="Registrasi">: {{$model->Registrasi}} </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            
                            <div class="row">
                                <div class="col-5">
                                    <p class="diskripsi">Izin Praktek</p>
                                </div>                        
                                <div class="col-7">
                                    <p class="diskripsi" id="IzinPraktek">: {{$model->IzinPraktek}}</p>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </div>
                    {{-- </div> --}}
                </div>
                </div>
        </div> 
        </div>
    </div>

</section>

@endsection
@push('script_top')
    <style>

    </style>
@endpush
@push('script_bottom')
<script>
</script>    
@endpush