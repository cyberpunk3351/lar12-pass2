@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>
                <div class="card-body">
                    <h3>Создать</h3>
                    <form action="{{ (empty($pass) ? route('pass.store') : route('pass.update', ['id'=>$pass->id])) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($pass))
                            @method('PATCH')
                        @endif
                        <div class="form-group">
                            <p>Пароль:</p>
                            <input name="pass[title]" type="text" class="form-control"  required value="{{ $pass->title ?? ''}}">
                        </div>
                        <div class="form-group">
                            <p>Для чего:</p>
                            <input name="pass[source]" type="text" class="form-control"  required value="{{ $pass->source ?? ''}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="pass[private]" value=0>
                            <input type="checkbox" name="pass[private]"
                            @if (isset($pass))
                            {{ $pass->private == 1 ? 'checked' : '' }}
                            @endif value=1>
                            
                                <label>Личный</label>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="pass[category_id]" id="category_id" class="form-control">
                                @if (isset($pass))
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{ $category->id == $pass->category_id ? 'selected' : '' }}
                                            >{{$category->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <input type="submit" value="Создаать пароль" class="btn btn-outline-success">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection