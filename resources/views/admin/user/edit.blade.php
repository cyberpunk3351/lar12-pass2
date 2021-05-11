@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    <h3>Редактировать роль для пользователя {{$user->name}}</h3>
                    <form action="{{ route('user.update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="role_id">Роль:</label>
                            
                        
                            <select name="user[role_id]" id="crole_id" class="form-control">
                                
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}"
                                        {{ $role->id == $user->role_id ? 'selected' : '' }}
                                        >{{$role->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Редактировать" class="btn btn-outline-success">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
