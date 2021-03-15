<div class="form-group">
	<strong>{{Form::label('id', 'ID')}}</strong>
	{{Form::text('id',null,['class'=>'form-control','id'=>'id','readonly'=>'readonly'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('caption', 'T&iacute;tulo')}}</strong>
	{{Form::text('caption',null,['class'=>'form-control','id'=>'caption'])}}
</div>
<div class="form-group">
	<strong>{{Form::label('abstract', 'Descripci&oacute;n')}}</strong>
	{{Form::textarea('abstract',null,['class'=>'form-control','id'=>'abstract','rows'=>'2'])}}
</div>
<hr/>
<div class="form-group">
	<strong>{{Form::label('options', 'Asignar Opciones')}}</strong>
	<div class="container">
		<div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
			@foreach($options as $option)
				<label>
					<div class="col">
			            <div class="p-3 border bg-light">
							
								@if(isset($profile) && $profile->options->contains($option->id))
									{{ Form::checkbox('options[]', $option->id,['class'=>'form-control',true] ) }} {{$option->caption}}
								@else
									{{ Form::checkbox('options[]', $option->id,['class'=>'form-control'] ) }} {{$option->caption}}
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
	<a href="{{route('profiles.index')}}" class="btn btn-sm btn-secondary">
            volver
    </a>
</div>