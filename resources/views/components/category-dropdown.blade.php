<x-dropdown>
                        <x-slot name="trigger">
                            <button 
                                class="w-full lg:w-32 text-left flex lg:inline-flex py-2 pl-3 pr-9 text-sm font-semibold">
                                {{isset($currentCategory)?ucwords($currentCategory->name):'Categories'}}
                             <x-down-arrow/>      
                             </button>   
                        </x-slot>

                        <x-dropdown-item  href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                                            :active="request()->routeIs('home') && is_null(request()->getQueryString())">
                            All
                        </x-dropdown-item>
                        
                        @foreach($categories as $category)
                      
                        <x-dropdown-item  href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page'))}}" :active='request()->fullUrlIs("*?category={$category->slug}*")'>                            
                            {{ucwords($category->name)}}                               
                        </x-dropdown-item>     
                        @endforeach  
</x-dropdown>   