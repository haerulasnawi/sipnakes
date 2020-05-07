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
        <label for="" class="control-label">Nama</label>
        {!!Form::text('full_name',null,['class'=>'form-control','id'=>'name'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Email</label>
        {!!Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
    </div>
{!!Form::close()!!}
