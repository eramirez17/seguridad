<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opciones del Sistema') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                                {{$option->id}} - {{$option->caption}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <p>Descripci&oacute;n: {{$option->abstract}}</p>
                            <p>Enlace: {{$option->link}}</p>
                            <p>Ventana: {{$option->target}}</p>
                            <p>
                                Padre: 
                                @if ($option->parent_id)
                                    {{$option->parent->caption}}
                                @else
                                    No tiene padre
                                @endif
                            </p>

                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>