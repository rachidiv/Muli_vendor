<div class="form-group">
    <x-form.input label="Category Name" class="form-control-lg" type="text" name="name" :value="$category->name " />

</div>
<div class="form-group">
    <label for="">
        Category Parent
    </label>
    <select name="parent_id" class="form-control form-select" id="">
        <option value="">Primary Category</option>
        @foreach($parents as $parent)
        <option @selected(old('parent_id',$category->parent_id)==$parent->id ) value="{{$parent->id }}
            ">{{$parent->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">

    <x-form.input label="Description" type="text" name="description" :value="$category->description " role="input" />
</div>
<div class="form-group">
    <x-form.label id="image">Image</x-form.label>
    <input type="file" name="image" id="">
</div>
<div class="form-group">
    <label for="">Status</label>
    <div>
        <x-form.radio name="status" :checked="$category->status"
            :options="['active' => 'Active','archived'=>'Archive']" />

    </div>
</div>
<button type="submit" class="btn btn-primary">
    {{$button_label ?? 'Save'}}
</button>