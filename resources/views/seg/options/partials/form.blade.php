<div class="form-group">
	<strong>{{Form::label('id', 'ID')}}</strong>
	{{Form::text('id',null,['class'=>'form-control','id'=>'id','readonly'=>'readonly'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('caption', 'Título')}}</strong>
	{{Form::text('caption',null,['class'=>'form-control','id'=>'name'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('abstract', 'Descripción')}}</strong>
	{{Form::textarea('abstract',null,['class'=>'form-control','id'=>'abstract','rows'=>'2'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('link', 'Enlace')}}</strong>
	{{Form::text('link',null,['class'=>'form-control','id'=>'link'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('target', 'Destino')}}</strong>
	{{Form::select('target', [
	'_self' => 'Misma Ventana',
	 '_blank' => 'Nueva Ventana',
	 '_parent' => 'Marco Padre',
	 '_top' => 'Superior'
	 ],['class'=>'form-control','id'=>'target'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('level', 'Nivel')}}</strong>
	{{Form::select('level', [
	'root' => 'Menú Raíz',
	 'node' => 'Nodo',
	 'child' => 'Hijo'
	 ],['class'=>'form-control','id'=>'level'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('parent_id', 'Padre')}}</strong>
	{{Form::select('parent_id',[''=>'---',$parentlist],null,['class'=>'form-control','id'=>'parent_id'])}}
</div>
<hr/>
<div class="form-group">
	<strong>{{Form::label('profiles', 'Asignar a perfiles')}}</strong>
	<div class="container">
		<div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">		
		@foreach($profiles as $profile)
			<label>
				<div class="col">
			        <div class="p-3 border bg-light">
					@if(isset($option) && $option->profiles->contains($profile->id))
						{{ Form::checkbox('profiles[]', $profile->id,['class'=>'form-control',true] ) }} {{$profile->caption}}
					@else
						{{ Form::checkbox('profiles[]', $profile->id,['class'=>'form-control'] ) }} {{$profile->caption}}
					@endif
					</div>
				</div>
			</label>
		@endforeach
		</div>
	</div>
</div>
<hr/>
<div class="form-group">
	{{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
	<a href="{{route('options.index')}}" class="btn btn-sm btn-secondary">
            volver
    </a>
</div>

@section('scripts')

<script type="text/javascript">

</script>
@endsection