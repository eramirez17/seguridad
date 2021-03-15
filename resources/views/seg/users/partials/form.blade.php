<div class="form-group">
	<strong>{{Form::label('id', 'ID')}}</strong>
	{{Form::text('id',null,['class'=>'form-control','id'=>'id','readonly'=>'readonly'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('name', 'Nombre Completo')}}</strong>
	{{Form::text('name',null,['class'=>'form-control','id'=>'name'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('email', 'Email')}}</strong>
	{{Form::email('email',null,['class'=>'form-control','id'=>'abstract','placeholder'=>'example@gmail.com'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('password', 'Contraseña')}}</strong>
	{{Form::password('password',null,['class'=>'form-control','id'=>'password'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('password_confirmation', 'Confirmar Contraseña')}}</strong>
	{{Form::password('password_confirmation',null,['class'=>'form-control','id'=>'password_confirmation'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('profile_id', 'Perfil')}}</strong>
	{{Form::select('profile_id',$profiles,null,['class'=>'form-control','id'=>'profile_id'])}}
</div>
<hr/>
<div class="form-group">
	{{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
	<a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">
            volver
    </a>
</div>

@section('scripts')

<script type="text/javascript">

</script>
@endsection