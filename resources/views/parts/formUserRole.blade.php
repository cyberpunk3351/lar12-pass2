<h2>{{ $user->name }}</h2>

<label for="role_id">Категория</label>
<select name="role_id" id="role_id" class="form-control">
    @foreach ($roles as $role)
        <option value="{{$role->id}}"
            {{ $role->id == $user->id ? 'selected' : '' }}
            >{{$role->title}}</option>
    @endforeach
</select>
