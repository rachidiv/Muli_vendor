@props([
'name','options','checked'=>false
])
@foreach($options as $value => $text)
<div class="form-check">
    <input type="radio" name="{{$name}}" @checked(old($name,$checked)==$value ) value="{{$value}}" {{
    $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($name)
        ])
}} id="{{$value}}">
    <label class="form-check-label" for="{{$value}}">
        {{$text}} </label>
</div>
@endforeach