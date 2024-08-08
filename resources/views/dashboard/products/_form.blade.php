<div class="form-group">
    <x-form.input label="Product Name" class="form-control-lg" role="input" name="name" :value="$product->name" />
</div>
<div class="form-group">
    <label for="">Category Parent</label>
    <select name="parent_id" class="form-control form-select">
        <option value="">Primary Category</option>
        @foreach($categories as $category)
        <option @selected(old('parent_id',$category->parent_id)==$category->id ) value="{{$category->id }}
            ">{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">

    <x-form.input label="Description" type="text" name="description" :value="$product->description " role="input" />
</div>
<div class="form-group">
    <x-form.label id="image">Image</x-form.label>
    <input type="file" name="image" id="">
    @if($product->image)
    <img src="{{asset('storage/'.$product->image)}}" height="60" alt="">
    @endif
</div>
<div class="form-group">

    <x-form.input label="Price" type="text" name="price" :value="$product->price " role="input" />
</div>
<div class="form-group">

    <x-form.input label="Compare Price" type="number" name="compare_price" :value="$product->compare_price "
        role="input" />
</div>
<div class="form-group">
    <x-form.input label="Tags" name="tags" :value="$tags" />
</div>
<div class="form-group">
    <label for="">Status</label>
    <div>
        <x-form.radio name="status" :checked="$product->status"
            :options="['active' => 'Active','draft'=>'Draft','archived'=>'Archive']" />

    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        {{$button_label ?? 'Save'}}
    </button>
</div>