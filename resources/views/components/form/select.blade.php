@props([
'value','selected'=>'','name','options','label'=>false
])
@if($label)
<label for="">
    {{$label}}
</label>
@endif
<select name="{{$name}}" {{$attributes->class([
    'form-control',
    'form-select',
    'is-invalid' => $errors->has($name)
    ])}} id="">
    @foreach($options as $value => $text)
    <option value="{{$value}}" @selected($value==$selected)>{{$text}} </option>

    @endforeach
</select>