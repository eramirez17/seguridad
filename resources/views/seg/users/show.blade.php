<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     @if(session('info'))
                        <div class="container">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-success">
                                    {{session('info')}}    
                                </div>
                            </div>                
                        </div>        
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                                <label>
                                    <strong>
                                        ID - Nombre Completo:
                                    </strong>
                                </label>
                                {{$user->id}} - {{$user->name}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <p>
                                <label>
                                    <strong>
                                        E-mail:
                                    </strong>
                                </label>
                                {{$user->email}}
                            </p>
                            <p>
                                <label>
                                    <strong>
                                        Perfil:
                                    </strong>
                                </label>
                                {{$user->profile->id}} - {{$user->profile->caption}}
                            </p>
                            <p>
                                <label>
                                    <strong>
                                        Fecha de Verificaci&oacute;n:
                                    </strong>
                                </label>                                
                                {{$user->email_verified_at}}
                            </p>
                            <hr/>
                            <a href="{{route('users.edit',$user)}}" class="btn btn-sm btn-primary">
                                    Editar
                            </a>
                            <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">
                                    volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>