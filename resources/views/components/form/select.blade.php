 
 @props(['name','category'])

<select class="" name="{{$name}}">
                @php 
                $categories=\App\Models\Category::all();

                @endphp
                @foreach($categories as $category)                
                    <option 
                        value="{{$category->id}}" 
                        {{old('category_id',$category->id) == $category->id ? 'selected':''}}>
                        {{ ucwords($category->name)}}
                    </option>
                @endforeach
</select>
@error('category')
    <span>{{$message}}</span>
@enderror