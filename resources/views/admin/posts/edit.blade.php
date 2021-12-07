@extends('layouts.master')
    
@section('content')
<x-navbar/>
<x-setting :heading="'Edit Post: '. $post->title">

    <x-panel>
        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <x-form.label name="title"/>
                <x-form.input name="title" :value="old('title',$post->title)" type="text"/>
            </div>

            <div class="mb-6">            
                <x-form.label name="slug"/>
                <x-form.input name="slug" :value="old('slug',$post->slug)"  type="text"/>
            </div>

            <div class="mb-6">           
                <x-form.label name="excerpt"/>
                <x-form.input name="excerpt" :value="old('excerpt',$post->excerpt)" type="text"/>
            </div>
            
            <div class="flex mb-6">
                <div class="">
                    <x-form.label name="thumbnail"/>
                    <x-form.input name="thumbnail" type="file"/>
                    @if(isset($post->thumbnail))
                    <div class="flex-inline">
                    <img src="/thumbnails/{{$post->thumbnail}}"> 
                    </div>           
                    @else
                        <span>No Images is uploaded</span>
                    @endif
                </div>
            </div>
                

            <div class="mb-6">
                <x-form.label name="body"/>
                <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>
            
            </div>

            <div class="mb-6 space-x-4 flex items-center justify-content-between">
                <x-form.label name="category"/>

            <x-form.select class="" name="category_id" :category="$post->category"/>
                    
        
            <x-form.submit name="Publish"/>
        </form>
    </x-panel>

</x-setting>

<x-footer/>
@endsection