<div class="form-group">
    <label for="role_id">Пользоваель</label>
    {{$user->name}}

    <select name="role_id" id="crole_id" class="form-control">
        
        @foreach ($roles as $role)
            <option value="{{$role->id}}"
                {{ $role->id == $user->role_id ? 'selected' : '' }}
                >{{$role->title}}
            </option>
        @endforeach
    </select>

</div>
