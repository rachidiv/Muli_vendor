<div class="form-group">
    <x-form.input label="role Name" class="form-control-lg" type="text" name="name" :value="$role->name " />

</div>
<fieldset>
    <legend>{{__('abilities')}} </legend>
    @foreach (config('abilities') as $ability_code => $ability_name)
    <div class="row">
        <div class="col-md-6">
            {{is_callable($ability_name) ? $ability_name() : $ability_name}}
        </div>
        <div class="col-md-2">
            <input type="radio" name="abilities[{{$ability_code}}]" value="allow"
                @checked(($role_abilities[$ability_code] ?? '' )=='allow' )>
            Allow
        </div>
        <div class="col-md-2">
            <input type="radio" name="abilities[{{$ability_code}}]" value="deny"
                @checked(($role_abilities[$ability_code] ?? '' )=='deny' )>
            Deny
        </div>
        <div class="col-md-2">
            <input type="radio" name="abilities[{{$ability_code}}]" value="inherit"
                @checked(($role_abilities[$ability_code] ?? '' )=='inherit' )>
            Inherit
        </div>
    </div>
    @endforeach
</fieldset>
<button type="submit" class="btn btn-primary">
    {{$button_label ?? 'Save'}}
</button>