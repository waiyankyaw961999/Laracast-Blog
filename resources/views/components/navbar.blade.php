<nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center space-x-2">
                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                          <button class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name}}</button>
                    </x-slot>
                    @if(auth()->user()->can('admin'))
                    <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">
                        Dashboard
                    </x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                        New Post
                    </x-dropdown-item>
                    @endif
                    <x-dropdown-item href="#" @click.prevent="document.querySelector('#logout-form').submit()" x-data="{}">
                        Logout
                    </x-dropdown-item>
                
                    <form class="hidden" id="logout-form" method="POST" action="/logout">
                        @csrf                        
                    </form>
                </x-dropdown>
                @else              
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                 <a href="/login" class="text-xs font-bold uppercase">Login</a>
                @endauth
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
</nav>