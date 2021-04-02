<div class="form-group">
    <label for="cat_id">Категория</label>
    {{$cats->tite}}

</div>
<div class="form-group">
    <input name="title" type="text" class="form-control"  required value="{{ $cats->title ?? ''}}">
</div>

<div class="form-group">
    <label for="role_id">Категория</label>

    <select name="role_id" id="role_id" class="form-control">
        
        @foreach ($roles as $role)
            
            <option value="{{$role->id}}"
                {{ $role->id == $cats->editor ? 'selected' : '' }}
                >{{$role->title}}</option>
        @endforeach
    </select>

</div>