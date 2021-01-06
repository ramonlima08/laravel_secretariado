<select name="{{$name}}" id="{{$id ?? $name}}" class="form-control {{$class ?? ''}}">
    @isset($default)
        <option value="{{$default['value']}}">{{$default['text']}}</option>
    @endisset
    @foreach ($options as $item)
        <option value="{{$item['value']}}" @if (isset($selected) && $item['value'] == $selected)
            selected="selected"
        @endif>{{$item['text']}}</option>
    @endforeach
</select>