@extends('layouts.master')
    
@section('content')
<x-navbar/>
<x-setting heading="Publish New Post">

    <x-panel>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <x-form.label name="title"/>
                <x-form.input name="title"  type="text"/>
            </div>

            <div class="mb-6">            
                <x-form.label name="slug"/>
                <x-form.input name="slug"  type="text"/>
            </div>

            <div class="mb-6">           
                <x-form.label name="excerpt"/>
                <x-form.input name="excerpt"  type="text"/>
            </div>
            
            <div class="mb-6">
            
                <x-form.label name="thumbnail"/>
                <x-form.input name="thumbnail" type="file"/>
            </div>

            <div class="mb-6">
                <x-form.label name="body"/>
                <x-form.textarea name="body"/>
            
            </div>

            <div class="mb-6 space-x-4 flex items-center justify-content-between">
                <x-form.label name="category"/>
                <x-form.select name="category_id"/>        
            </div>
        
            <x-form.submit name="Publish"/>
        </form>
    </x-panel>

</x-setting>

<x-footer/>
@endsection