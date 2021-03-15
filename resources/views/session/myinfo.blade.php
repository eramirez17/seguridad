<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cambiar mi contraseña') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => ['savemyinfo']]) !!}
                    	{{Form::hidden('id',Auth::user()->id)}}
                    	{{Form::hidden('form','info')}}
                    	<div class="form-group">
							<strong>{{Form::label('id', 'ID')}}</strong>
							{{Form::label('id', Auth::user()->id)}}
						</div>
						<div class="form-group">
							<strong>{{Form::label('name', 'Nombre Completo')}}</strong>
							{{Form::text('name',Auth::user()->name,['class'=>'form-control','id'=>'name'])}}
						</div>
						<div class="form-group">
							<strong>{{Form::label('email', 'Email')}}</strong>
							{{Form::email('email',Auth::user()->email,['class'=>'form-control','id'=>'abstract','placeholder'=>'example@gmail.com'])}}
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
							{{Form::text('profile',Auth::user()->profile->caption,['class'=>'form-control','id'=>'name','readonly'])}}
						</div>
						<hr/>
						<div class="form-group">
							{{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
							<a href="{{route('dashboard')}}" class="btn btn-sm btn-secondary">
						            volver
						    </a>
						</div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>