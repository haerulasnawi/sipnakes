{!!Form::model($model,[
    'route'=>'nakes.store',
    'method'=>'post'
])!!}
    <div class="form-group">
    <label for="" class="control-label">Jenis Nakes</label>
        {!!Form::select('jnakes', $jnakes, null, ['placeholder' => 'Pilih Jenis Nakes...','class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">NIK</label>
        {!!Form::text('nik',null,['class'=>'form-control','id'=>'nik'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">NIP</label>
        {!!Form::text('nip',null,['class'=>'form-control','id'=>'nip'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Gelar Depan</label>
        {!!Form::text('gelar_depan',null,['class'=>'form-control','id'=>'gelar_depan'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Nama Lengkap</label>
        {!!Form::text('full_name',null,['class'=>'form-control','id'=>'name'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Gelar Belakang</label>
        {!!Form::text('gelar_belakang',null,['class'=>'form-control','id'=>'gelar_belakang'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Jenis Kelamin</label>
            {!!Form::select('gender',['L'=>'Laki-laki','P'=>'Perempuan'], null, ['placeholder' => 'Pilih Jenis Kelamin...','class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Kontak</label>
        {!!Form::text('nakes_phone_number',null,['class'=>'form-control','id'=>'nakes_phone_number'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Email</label>
        {!!Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
    </div>
{!!Form::close()!!}
