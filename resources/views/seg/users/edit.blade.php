<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('password'))
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="alert alert-success">
                                {{session('password')}}    
                            </div>
                        </div>                
                    </div>        
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::model($user,['route' => ['users.update',$user->id],'method'=>'PUT']) !!}
                        @include('seg.users.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>