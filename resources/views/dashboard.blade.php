@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Имя: {{ $user }}</h1>
                    <p>Роль: {{ $rolename }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Пароль</th>
                                <th scope="col">Категория</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passes as $pass)
                                <tr>
                                    <td>{{ $pass->title }}</td>
                                    <td>{{ $pass->category->title }}</td>
                                    <td>
                                        <a href="{{ route('edit', ['id'=>$pass->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroy', ['id'=>$pass->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value=" X ">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('create') }}">Создать</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
