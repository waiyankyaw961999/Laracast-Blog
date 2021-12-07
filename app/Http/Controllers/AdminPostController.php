<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //

    public function index()
    {
        return view('admin.posts.index',
                    ['posts' => Post::paginate(10)]);
    }

     public function create()
    {     
        return view('admin.posts.create');
    }

    public function edit(Post $post){

        return view('admin.posts.edit',['post'=>$post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts');
    }

    public function update(Post $post){

        $attributes = $this->validatePost($post);
       if(isset($attributes['thumbnail']))
        {
            $path = request()->file('thumbnail');
            $attributes['user_id']= auth()->id();
            $file_path = time().$path->getClientOriginalName();
            request()->file('thumbnail')->move(public_path('thumbnails/'),$file_path);
            $attributes['thumbnail'] = $file_path;
        }
        
        $post->update($attributes);

        return back()->with('success','Post Updated!');
    }   
    
    public function store()
        {            
            $post = new Post();
            $attributes = $this->validatePost($post);
        
            $path = request()->file('thumbnail');
            $attributes['user_id']= auth()->id();
            $file_path = time().$path->getClientOriginalName();
            request()->file('thumbnail')->move(public_path('thumbnails/'),$file_path);
            $attributes['thumbnail'] = $file_path;
            Post::create($attributes);

            return redirect('/');
        }

    public function validatePost(?Post $post=null):array
    {
        $post ??= new Post();
        $attributes= request()->validate(['title'=>'required',
                                    'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
                                    'excerpt'=>'required',
                                    'thumbnail'=>$post->exists? ['image']:['required','image'],
                                    'body'=>'required',
                                    'category_id'=>'required',
                                    'published_at'=>'required']);
        return $attributes;
    }
}
