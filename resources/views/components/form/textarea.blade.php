 
 @props(['name'])
<textarea {{$attributes}} required name="body" id="body" type="textarea" class="border border-gray-400 p-2 w-full">
    {{ $slot ?? old($name) }}
</textarea>
@error($name)
<span>{{$message}}</span>
 @enderror