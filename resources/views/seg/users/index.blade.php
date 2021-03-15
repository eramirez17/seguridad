<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios del Sistema') }}
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
                        <a href="{{route('users.create')}}" class="btn btn-success btn-sm pull-right">
                                Nuevo
                        </a>    
                    </div>
                    <hr/>
                    {{$users->render()}}
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">e-mail</th>
                              <th scope="col">Perfil</th>
                              <th scope="col" colspan="2" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td scope="row">
                                <a href="{{route('users.show',$user->id)}}">
                                    {{$user->id}}
                                </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('users.show',$user->id)}}">
                                        {{$user->name}}
                                    </a>
                            </td>
                            <td scope="row">
                                    <a href="{{route('users.show',$user->id)}}">
                                        {{$user->email}}
                                    </a>
                            </td>
                            <td scope="row">
                                <a href="{{route('users.show',$user->id)}}">
                                    {{$user->profile->caption}}
                                </a>
                            </td>
                            <td scope="row" class="text-right">
                                <a href="{{route('users.edit',$user)}}">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Modificar
                                    </button>
                                </a>
                            </td> 
                            <td scope="row"class="text-left">
                                {!! Form::open(['route' => ['users.destroy',$user->id],'method'=>'DELETE']) !!}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                {!! Form::close() !!}
                            </td> 
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$users->render()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>