@extends('layouts.master')
 
@section('content')
<x-navbar/>
    <x-setting heading="Manage Posts">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($posts as $post)                        
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                 <a class="hover:underline hover:text-blue-600" href="/posts/{{$post->slug}}">{{$post->title}}</a>
                                </div>
                            </td>
                        
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$post->created_at->diffForHumans()}}
                                </span>
                            </td>
                        
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/posts/{{$post->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>                   
                            
                              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/posts/{{$post->id}}/delete" class="text-indigo-600 hover:text-indigo-900">delete</a>
                            </td>    
                            </tr>
                        @endforeach
                        {{$posts->links()}}
                      
                    </tbody>

                    </table>
                </div>
                </div>
            </div>
        </div>
    </x-setting>
<x-footer/>
@endsection