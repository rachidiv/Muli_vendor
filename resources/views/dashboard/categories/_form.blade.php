<div class="form-group">
    <label for="">
        Category Name
    </label>
    <input type="text" value="{{$category->name}}" name="name" class="form-control">
</div>
<div class="form-group">
    <label for="">
        Category Parent
    </label>
    <select name="parent_id" class="form-control form-select" id="">
        <option value="">Primary Category</option>
        @foreach($parents as $parent)
        <option @selected($category->parent_id == $parent->id ) value="{{$parent->id}} ">{{$parent->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="">Description</label>
    <textarea value="{{$category->description}}" name="description" id="" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" accept="image/*" class="form-control">
</div>
<div class="form-group">
    <label for="">Status</label>
    <div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" @checked($category->status == 'active')
            value="active" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Active </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" @checked($category->status == 'archived')
            value="archived" id="flexRadioDefault2"
            checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Archived </label>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">
    {{$button_label ?? 'Save'}}
</button>