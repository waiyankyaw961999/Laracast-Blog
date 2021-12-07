@extends('layouts.master')
    
@section('content')
<x-navbar/>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded p-6">
      
                <h1 class="text-center font-bold text-xl">Login</h1>

                <form method="POST" action="/login/" class="mt-10">
                    @csrf           

                    <div class="mb-6">
                        <x-form.label name="username"/>
                        <x-form.input name="username" type="text"/>
                    </div>

                    <div class="mb-6">
                        <x-form.label name="email"/>
                        <x-form.input name="email" type="email"/>                      
                    </div>

                    <div class="mb-6">
                        <x-form.label name="password"/>
                        <x-form.input name="password" type="password"/>
                    </div>

                    
                    <div class="mb-6 text-center">
                        <x-form.submit name="Login"/>                       
                    </div>                    
                </form>
           
        </main>
    </section>
    <x-flash/>
<x-footer/>

@endsection