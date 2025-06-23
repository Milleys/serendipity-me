@if ($serendipities->count())
<div class="w-full max-w-7xl mx-auto px-4 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($serendipities as $item)
        <a href="{{ route('serendipity.show', $item->id) }}" class="block">
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <img src="{{ $item->image_path ? asset($item->image_path) : $item->imgurl }}"  
                    class="w-full h-48 object-cover" alt="Serendipity Image" />
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
            </div>
        </a>

        @endforeach
    </div>
</div>
@else
<p class="text-center text-gray-500">No past serendipities yet.</p>
@endif
