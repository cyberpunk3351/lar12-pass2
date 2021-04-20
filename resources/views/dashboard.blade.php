@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель управления') }}</div>
                

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($users as $user)
                        <h3>{{ $user->name }}</h3>
                        <p>Роль: {{$user->role->title}}</p>
                    @endforeach
                    <a href="{{ route('pass.create') }}" class="btn btn-success mb-3">Создать</a>
                    <div class="card text-white bg-primary my-2 py-2 text-center">Личные</div>
                    <table class="table mb-5">
                        <thead>
                            <tr>
                                <th scope="col">Пароль</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Источник</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passprivate as $pass)
                                <tr>
                                    <td>{{ $pass->title }}</td>
                                    <td>{{ $pass->category->title }}</td>
                                    <td>{{ $pass->source }}</td>
                                    <td>
                                        <a href="{{ route('pass.edit', ['id'=>$pass->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('pass.destroy', ['id'=>$pass->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value=" X ">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card text-white bg-dark my-2 py-2 text-center">Общие</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Пароль</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Источник</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passcommon as $pass)
                                <tr>
                                    <td>{{ $pass->title }}</td>
                                    <td>{{ $pass->category->title }}</td>
                                    <td>{{ $pass->source }}</td>
                                    <td>
                                        @if (Auth::user()->role_id == 1 || $user->role->id == $pass->category->editor)
                                            <a href="{{ route('pass.edit', ['id'=>$pass->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button></a>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if (Auth::user()->role_id == 1 || $user->role->id == $pass->category->editor)
                                            <form action="{{ route('pass.destroy', ['id'=>$pass->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger btn-sm" value=" X ">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
