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
                    {{$options->render()}}
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">T&iacute;tulo</th>
                              <th scope="col">Descripci&oacute;n</th>
                              <th scope="col">Padre</th>
                              <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($options as $option)
                        <tr>
                            <td scope="row">
                                <a href="{{route('option',$option->id)}}">
                                    {{$option->id}}
                                </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('option',$option->id)}}">
                                        {{$option->caption}}
                                    </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('option',$option->id)}}">
                                        {{$option->abstract}}
                                    </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('option',$option->id)}}">
                                        @if ($option->parent_id)
                                            {{$option->parent->caption}}
                                        @endif
                                    </a>
                            </td>
                            <td scope="row">
                                <a href="#">
                                    <button type="button" class="btn btn-primary">
                                        Modificar
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </a>
                            </td> 
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$options->render()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>