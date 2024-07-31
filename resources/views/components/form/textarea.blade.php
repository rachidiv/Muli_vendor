@props([
'type' => 'text','name' , 'value'=>'','label' => false
])
<!-- we define attribute which input expect  -->
@if($label)
<label for="">
    {{$label}}
</label>
@endif
<textarea type="{{$type}} " name="{{$name}} " {{
    $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
        ])
}}>{{old($name,$value)}} </textarea>
@error($name)
<div class="invalid-feedback">
    {{$message}}

</div>
@enderror