{!! Form::model($model,[

    'route'=>$model->exists ? ['users.update',$model->id] : 'users.store',
    'method'=>$model->exists ?'PUT':'POST'
]) !!}
<div class="form-group">
    {{-- <label for="" class="control-label">Password</label> --}}
    {!! Form::label('password', 'password', ['class'=>'d-block']) !!}
    {!! Form::password('password',['class'=>'form-control','id'=>'password','name'=>'password','required autocomplete'=>'new-password']) !!}

    {{-- <label for="password" class="d-block">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
</div>
<div class="form-group">
    {{-- <label for="" class="control-label">Masukan Password</label> --}}
    {!! Form::label('password2', 'Konfirmasi Password', ['class'=>'d-block']) !!}
    {!! Form::password('password',['class'=>'form-control','id'=>'password-confirm','name'=>'password_confirmation','required autocomplete'=>'new-password']) !!}

    {{-- <label for="password2" class="d-block">Password Confirmation</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}
</div>
{!! Form::close() !!}
