<div class="form-group">
    <label for="role_id">Пользоваель</label>
    {{$users->name}}

    <select name="role_id" id="crole_id" class="form-control">
        
        @foreach ($roles as $role)
            <option value="{{$role->id}}"
                {{ $role->id == $users->role_id ? 'selected' : '' }}
                >{{$role->title}}
            </option>
        @endforeach
    </select>

</div>
