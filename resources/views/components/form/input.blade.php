@props(['name','type'])
<input  {{$attributes(['value'=>old($name)])}}
        name="{{$name}}" 
        id="{{$name}}" 
        type="{{$type}}" 
        class="border border-gray-400 p-2 w-full">
        @error($name)
            <span>{{$message}}</span>
        @enderror