@if ($serendipities->count())
<div class="w-full max-w-7xl mx-auto px-4 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($serendipities as $item)
       <!-- <a href="{{ route('serendipity.show', $item->id) }}" class="block relative"> -->
            
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    
            <div class="relative">
                    <!-- ICON -->
                  
                        <div x-data="{ open: false }" class="absolute top-1 right-2 bg-black-100 rounded-full">
                            <button @click="open = !open">
                                <span class="material-symbols-outlined" style = "color: white;">more_horiz</span>
                            </button>

                            <!-- Dropdown Menu -->
                            <div 
                                x-show="open"
                                @click.away="open = false"
                                class="absolute w-20 bg-white rounded-md shadow-lg z-50"
                            >
                                <ul>
                                    <li>
                                        <form action="{{ route('posts.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type = "submit" class="block w-full text-center p-0 text-sm hover:bg-gray-100 rounded-md text-gray-600">
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            <button class="block w-full text-center p-0 text-sm  hover:bg-gray-100  rounded-md text-gray-600">
                                                Archive
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                                    

                <!-- IMAGE -->
                <a href="{{ route('serendipity.show', $item->id) }}">
                    <img src="{{ $item->image_path ? asset($item->image_path) : $item->imgurl }}"  
                        class="w-full h-48 object-cover" alt="Serendipity Image" />
                </a>
            </div>
                
            <a href="{{ route('serendipity.show', $item->id) }}">
                <div class="p-4">
                    <h4 class="font-semibold text-gray-900 mb-2">{{ $item->activity }}</h4>
                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($item->description, 100) }}</p>
                    <div class="mt-4 text-xs text-gray-500 flex justify-between items-center">
                        <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                        <span>
                            {{ $item->completed_at ? \Carbon\Carbon::parse($item->completed_at)->format('F j') : 'N/A' }}
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <!--   </a> -->

        @endforeach
    </div>
</div>
@else
<p class="text-center text-gray-500">No past serendipities yet.</p>
@endif
