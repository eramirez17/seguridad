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
                        {{Form::hidden('form','password')}}
                        <div class="form-group">
							<strong>{{Form::label('password', 'Contraseña')}}</strong>
							{{Form::password('password',null,['class'=>'form-control','id'=>'password'])}}
						</div>
						<div class="form-group">
							<strong>{{Form::label('password_confirmation', 'Confirmar Contraseña')}}</strong>
							{{Form::password('password_confirmation',null,['class'=>'form-control','id'=>'password_confirmation'])}}
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