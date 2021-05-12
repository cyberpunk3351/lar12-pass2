@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Панель управления') }}</div>
                <div class="card-body">
                    <h3>Редактировать</h3>
                    <form action="{{ (empty($cat) ? route('category.store') : route('category.update', ['id'=>$cat->id])) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($cat))
                            @method('PATCH')
                        @endif
                        <div class="form-group">
                            <label for="cat_id">Категория</label>
                            {{$cat->tite ?? ''}}
                        </div>
                        <div class="form-group">
                            <input name="category[title]" type="text" class="form-control"  required value="{{ $cat->title ?? ''}}">
                        </div>
                        <input type="submit" value="Создать" class="btn btn-outline-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection