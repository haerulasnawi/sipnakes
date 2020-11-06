{!!Form::model($model,[
    'route'=>'nakes.store',
    'method'=>'post',
    'files'=>'true'
])!!}
    <div class="form-group required">
    <label for="" class="control-label">Kategori</label>
        {!!Form::select('jnake_id', $jnakes, null, ['placeholder' => 'Pilih Rumpun...','class'=>'form-control','id'=>'jnake_id'])!!}
    </div>
    <div class="form-group required">
    <label for="" class="control-label">Rumpun SDMK</label>
        {!!Form::select('', $jnakes, null, ['placeholder' => 'Pilihan...','class'=>'form-control','id'=>'jnake_id'])!!}
    </div>
    <div class="form-group required">
    <label for="" class="control-label">Sub Rumpun SDMK</label>
        {!!Form::select('', $jnakes, null, ['placeholder' => 'Pilihan...','class'=>'form-control','id'=>'jnake_id'])!!}
    </div>
    <div class="form-group required">
    <label for="" class="control-label">Grup Status Kepegawaian</label>
        {!!Form::select('', $jnakes, null, ['placeholder' => 'Pilihan...','class'=>'form-control','id'=>'jnake_id'])!!}
    </div>
    <div class="form-group required">
    <label for="" class="control-label">Status Kepegawaian SDMK</label>
        {!!Form::select('', $jnakes, null, ['placeholder' => 'Pilihan...','class'=>'form-control','id'=>'jnake_id'])!!}
    </div>
    <div class="form-group required">
    <label for="" class="control-label">Jenis SDMK</label>
        {!!Form::select('', $jnakes, null, ['placeholder' => 'Pilihan...','class'=>'form-control','id'=>'jnake_id'])!!}
    </div>
    <div class="form-group required">
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
    <div class="form-group required">
        <label for="" class="control-label">Nama Depan</label>
        {!!Form::text('first_name',null,['class'=>'form-control','id'=>'first_name'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Nama Belakang</label>
        {!!Form::text('last_name',null,['class'=>'form-control','id'=>'last_name'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Gelar Belakang</label>
        {!!Form::text('gelar_belakang',null,['class'=>'form-control','id'=>'gelar_belakang'])!!}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Jenis Kelamin</label>
            {!!Form::select('gender',['L'=>'Laki-laki','P'=>'Perempuan'], null, ['placeholder' => 'Pilih Jenis Kelamin...','class'=>'form-control','id'=>'gender'])!!}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Tanggal Lahir</label>
            <!-- {{-- {!!Form::date('tgl_lahir',['class'=>'form-control'])!!} --}} -->
            {{ Form::date('tgl_lahir', null, ['class' => 'form-control','id'=>'tgl_lahir']) }}
            <!-- {{-- {{ Form::text('deadline', null, ['class' => 'form-control', 'id'=>'datetimepicker']) }} --}} -->
    </div>
    @if(Auth::user()->role=='admin'||'faskes')
    <div class="form-group required">
        <label for="" class="control-label">Nomor STR</label>
        {!!Form::text('str_nomor',null,['class'=>'form-control','id'=>'str_nomor'])!!}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Tanggal Terbit STR</label>
            {{-- {!!Form::date('str_terbit',['class'=>'form-control'])!!} --}}
            {{ Form::date('str_terbit', null, ['class' => 'form-control','id'=>'str_terbit']) }}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Tanggal Berakhir STR</label>
            <!-- {{-- {!!Form::date('str_exp',['class'=>'form-control'])!!} --}} -->
            {{ Form::date('str_exp', null, ['class' => 'form-control','id'=>'str_exp']) }}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Dokumen STR</label>
        <!-- <input type="file" name="str_file" class="form-control" id="str_file"> -->
        {{Form::file('str_file',['class'=>'form-control','id'=>'str_file'])}}
    </div>  
    <div class="form-group required">
        <label for="" class="control-label">Nomor SIP</label>
        {!!Form::text('sip_nomor',null,['class'=>'form-control','id'=>'sip_nomor'])!!}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Tanggal Terbit SIP</label>
            <!-- {{-- {!!Form::date('sip_terbit',['class'=>'form-control'])!!} --}} -->
            {{ Form::date('sip_terbit', null, ['class' => 'form-control','id'=>'sip_terbit']) }}
    </div>
    <div class="form-group required">
        <label for="" class="control-label">Dokumen SIP</label>
        {{Form::file('sip_file',['class'=>'form-control','id'=>'sip_file','accept'=>'application/pdf'])}}
    </div>
    @endif
    <div class="form-group">
        <label for="" class="control-label">Kontak</label>
        {!!Form::text('nakes_phone_number',null,['class'=>'form-control','id'=>'nakes_phone_number'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Alamat</label>
        {!!Form::textarea('alamat_nakes',null,['class' => 'form-control'])!!}
    </div>
    {{-- <div class="form-group">
        <label for="" class="control-label">Email</label>
        {!!Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
    </div> --}}
{!!Form::close()!!}
