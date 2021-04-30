<div class="form-group">
    <p>Пароль:</p>
    <input name="pass[title]" type="text" class="form-control"  required value="{{ $pass->title ?? ''}}">
</div>
<div class="form-group">
    <p>Для чего:</p>
    <input name="pass[source]" type="text" class="form-control"  required value="{{ $pass->source ?? ''}}">
</div>
{{-- <div class="form-group">
    <input type="checkbox" name="pass[private]">
        <label>Личный</label>
</div> --}}
<div class="form-group">
    <label for="category_id">Категория</label>
    <select name="pass[category_id]" id="category_id" class="form-control">
        @foreach ($categorys as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
</div>
