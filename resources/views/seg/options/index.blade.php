<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opciones del Sistema') }}
        </h2>
    </x-slot>

    <div class="py-12">
    	@if(session('info'))
            <div class="container">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="alert alert-success">
                        {{session('info')}}    
                    </div>
                </div>                
            </div>        
        @endif

        @if(count($errors))
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        {{session('info')}}    
                    </div>
                </div>                
            </div>        
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                	<div class="container text-right">
                        <a href="{{route('options.create')}}" class="btn btn-success btn-sm pull-right">
                                Nuevo
                        </a>    
                    </div>
                    <hr/>
                    {{$options->render()}}
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">T&iacute;tulo</th>
                              <th scope="col">Descripci&oacute;n</th>
                              <th scope="col">Padre</th>
                              <th scope="col" class="text-center" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($options as $option)
                        <tr>
                            <td scope="row">
                                <a href="{{route('options.show',$option->id)}}">
                                    {{$option->id}}
                                </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('options.show',$option->id)}}">
                                        {{$option->caption}}
                                    </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('options.show',$option->id)}}">
                                        {{$option->abstract}}
                                    </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('options.show',$option->id)}}">
                                        @if ($option->parent_id)
                                            {{$option->parent->caption}}
                                        @endif
                                    </a>
                            </td>
                            <td scope="row" class="text-right">
                                <a href="{{route('options.edit',$option)}}">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Modificar
                                    </button>
                                </a>
                            </td> 
                            <td scope="row"class="text-left">
                                {!! Form::open(['route' => ['options.destroy',$option],'method'=>'DELETE']) !!}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                {!! Form::close() !!}
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