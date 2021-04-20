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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach ($roles as $role)
                                <th>{{$role->title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('connections.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->title}}</td>
                                    @foreach ($roles as $role)
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" name="category[{{$category->id}}][{{$role->id}}]" value="{{$role->id}}" type="checkbox"
                                                @if(in_array($role->id, $category->roles()->pluck('id')->all())) checked @endif>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                                <input type="submit" value="Сохранить" class="btn btn-outline-success">
                            </form>
                        </tbody>
                    </table>
                            
                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection