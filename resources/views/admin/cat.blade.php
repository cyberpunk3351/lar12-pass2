@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Редактирование Категорий</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Имя каегории</th>
                                <th scope="col">Редактор</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $cat->title }}</td>
                                    <td>{{ $cat->role->title ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('cat.edit', ['id'=>$cat->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('cat.create') }}">Создать</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
