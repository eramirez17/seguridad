<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Usuarios del Sistema') }}
                    </h2>    
                </div>
                <div class="col-sm text-right">
                    <a href="{{route('users.create')}}" class="btn btn-success btn-sm text-right">
                        Nuevo
                    </a>
                </div>
            </div>
        </div>
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
                    <h6>Filtrar Busqueda</h6>
                    {!! Form::open(['route' => ['users.index'],'method'=>'GET','class'=>'form-inline text-right']) !!}
                        <div class="row">
                            <div class="col input-group text-right">
                                {{Form::text('id',null,['class'=>'form-control','placeholder'=>'ID'])}}
                            </div>
                            <div class="col input-group text-right">
                                {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre'])}}
                            </div>
                            <div class="col input-group text-right">
                                {{Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
                            </div>
                            <div class="col input-group text-right">
                                {{Form::select('profile_id',[''=>'Perfil',$profiles],null,['class'=>'form-control'])}}
                            </div>
                            <div class="col input-group text-right">
                                {{Form::select('paginate',['10'=>'10','20'=>'20','50'=>'50'],null,['class'=>'form-control'])}}
                            </div>
                            
                            <div class="col input-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
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