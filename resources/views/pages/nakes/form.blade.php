{!!Form::model($nakes,[
    'route'=>'nakes.store',
    'method'=>'post'
])!!}
    <div class="form-group">
        <label for="" class="control-label">Jenis Nakes</label>
        {!!Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...','class'=>'form-control'])!!}
        {{-- {!!Form::text('name',null,['class'=>'form-control','id'=>'name'])!!} --}}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Nama</label>
        {!!Form::text('name',null,['class'=>'form-control','id'=>'name'])!!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Email</label>
        {!!Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
    </div>  
{!!Form::close()!!}