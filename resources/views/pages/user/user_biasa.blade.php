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
            <h4>Basic DataTables</h4>
            </div>
            <div class="card-body">
                <form id="search_form">
                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="role">Jenis User</label>
                    <select name="role" id="role" class="form-control">
                    <option value="">==Pilih Role==</option>
                    <option value="faskes">Faskes</option>
                    <option value="nakes">Nakes</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="username">Nama User  </label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
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
                    <th>Role</th>
                    <th>Username</th>
                    {{-- <th>Nama Lengkap</th> --}}
                    <th>Email</th>
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
            columnDefs: [ {
                searchable: false,
                orderable: false,
                targets: [0]
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
            url:"{{route('table.daftar.user')}}",
            type:'post',
            data:function(d){
                d.username=$('#username').val();
                d.role=$('#role').val();
                d.email=$('#email').val();
            }
            },
            columns: [
                {data:'DT_RowIndex', name: 'DT_RowIndex'},
                {data:'role',name:'role'},
                {data:'username',name:'username'},
                // {data:'full_name',name:'users.first_name'},
                {data:'email',name:'email'},
                {data:'action',name:'id',searchable:false}
            ],
        });
        $('#search_form').on('submit',function(e){
        t.draw();
        e.preventDefault();
        });
        $('#search_form').on('reset',function(e){
        $('#role').val('');
        $('#username').val('');
        $('#email').val('');
        t.draw();
        e.preventDefault();
        });
    });
</script>
@endpush
