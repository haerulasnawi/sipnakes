{!!Form::model($model,[
    'route'=>'str.store',
    'method'=>'post',
    'files'=>'true'
])!!}
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
        {{Form::file('str_file',['class'=>'form-control','id'=>'str_file'])}}
    </div>  
{!!Form::close()!!}
