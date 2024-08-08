@props([
'type'=>'text','name'=>'', 'value'=>'','label' => false
])
<!-- we define attribute which input expect  -->
@if($label)
<label for="">
    {{$label}}
</label>
@endif
<input type="{{$type}}" value="{{old($name,$value)}}" name="{{$name}}" {{
    $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
        ])
}}>
@error($name)
<div class="invalid-feedback">
    {{$message}}

</div>
@enderror