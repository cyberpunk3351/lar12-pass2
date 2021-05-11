<div class="form-group">
    <label for="cat_id">Категория</label>
    {{$cats->tite}}

</div>
<div class="form-group">
    <input name="category[title]" type="text" class="form-control"  required value="{{ $cats->title ?? ''}}">
</div>