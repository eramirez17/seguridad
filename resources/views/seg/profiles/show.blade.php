<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Perfil') }}
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
                                        ID - T&iacute;tulo:
                                    </strong>
                                </label>
                                {{$profile->id}} - {{$profile->caption}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <p>
                                <label>
                                    <strong>
                                        Descripci&oacute;n:
                                    </strong>
                                </label>
                                 {{$profile->abstract}}
                             </p>
                             <hr/>
                             <p>
                                <label>
                                    <strong>
                                        Opciones Asignadas:
                                    </strong>
                                </label>
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                 @foreach($profile->options as $option)
                                        <div class="col">
                                            <div class="p-3 border bg-light">{{$option->caption}}</div>
                                        </div>
                                 @endforeach
                                    </div>
                                </div>
                            </p>
                            <hr/>
                            <p>
                                <label>
                                    <strong>
                                        Usuarios con este Perfil:
                                    </strong>
                                </label>
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                 @foreach($profile->users as $user)
                                        <div class="col">
                                            <div class="p-3 border bg-light">{{$user->id}} - {{$user->name}}</div>
                                        </div>
                                 @endforeach
                                    </div>
                                </div>
                            </p>
                            <hr/>
                            <a href="{{route('profiles.edit',$profile)}}" class="btn btn-sm btn-primary">
                                    Editar
                            </a>
                            <a href="{{route('profiles.index')}}" class="btn btn-sm btn-secondary">
                                    volver
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>