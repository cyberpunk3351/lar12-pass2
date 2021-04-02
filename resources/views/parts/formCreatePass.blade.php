<div class="form-group">
    <input name="title" type="text" class="form-control"  required value="{{ $pass->title ?? ''}}">
</div>
<div class="form-group">
    <input type="checkbox" name="common">
        <label>Общий</label>
</div>
<div class="form-group">
    <label for="category_id">Категория</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach ($categorys as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>

</div>
