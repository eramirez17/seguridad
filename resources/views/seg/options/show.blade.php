<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Opción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                                <label>
                                    <strong>
                                        ID - T&iacute;tulo:
                                    </strong>
                                </label>
                                {{$option->id}} - {{$option->caption}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <p>
                                <label>
                                    <strong>
                                        Descripci&oacute;n:
                                    </strong>
                                </label>
                                {{$option->abstract}}
                            </p>
                            <p>
                                <label>
                                    <strong>
                                        Enlace:
                                    </strong>
                                </label>
                                {{$option->link}}
                            </p>
                            <p>
                                <label>
                                    <strong>
                                        Ventana Destino:
                                    </strong>
                                </label>
                                {{$option->target}}
                            </p>
                            <p>
                                <label>
                                    <strong>
                                        Padre:
                                    </strong>
                                </label>
                                @if ($option->parent_id)
                                    {{$option->parent->caption}}
                                @else
                                    No tiene padre
                                @endif
                            </p>
                            <p>
                                <label>
                                    <strong>
                                        Nivel:
                                    </strong>
                                </label>
                                    {{$option->level}}
                            </p>
                            <hr/>
                             <p>
                                <label>
                                    <strong>
                                        Perfiles Asociados:
                                    </strong>
                                </label>
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                 @foreach($option->profiles as $profile)
                                        <div class="col">
                                            <div class="p-3 border bg-light">{{$profile->caption}}</div>
                                        </div>
                                 @endforeach
                                    </div>
                                </div>
                            </p>
                            <hr/>
                            <a href="{{route('options.edit',$option)}}" class="btn btn-sm btn-primary">
                                    Editar
                            </a>
                            <a href="{{route('options.index')}}" class="btn btn-sm btn-secondary">
                                    volver
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>