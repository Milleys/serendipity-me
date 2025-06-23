
@if ($serendipity)

<div class="bg-white rounded-xl shadow overflow-hidden">
    {{-- Header --}}
    <div class="px-6 py-4 border-b">
        <h2 class="text-lg font-semibold flex items-center space-x-2 text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </svg>
            <span>Current Serendipity</span>
        </h2>
    </div>

    {{-- Content --}}
    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Image Section --}}
        <div class="relative">
            <div class="w-full h-50 rounded-lg overflow-hidden border border-black/20">
                <img
                    src="{{ $serendipity->imgurl }}"
                    alt="Current serendipity"
                    class="w-full h-full object-cover"
                />
                <div class="absolute top-3 right-3 bg-white bg-opacity-90 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Text Content --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-gray-900">
                {{ $serendipity->activity }}
            </h3>
            <p class="text-gray-600 leading-relaxed">
            {{ $serendipity->description }}
            </p>

            <div class="flex items-center space-x-4 text-sm text-gray-500">
                <div class="flex items-center space-x-1">
                @if($serendipity->completed_at == null)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 17h14M5 21h14M3 5h18a2 2 0 012 2v14a2 2 0 01-2 2H3a2 2 0 01-2-2V7a2 2 0 012-2z" />
                    </svg>
                   
                    <span>{{ \Carbon\Carbon::parse($serendipity->created_at)->diffForHumans() }}</span>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>

                    <span>{{ \Carbon\Carbon::parse($serendipity->completed_at)->diffForHumans() }}</span>
                    @endif
                </div>
                <div class="flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17.657 16.657L13.414 12l4.243-4.243a6 6 0 10-8.485 8.485L12 13.414l4.243 4.243a6 6 0 001.414-1.414z" />
                    </svg>
                    <span>Downtown District</span>
                </div>
            </div>

            
        </div>

        <div class="col-span-1 lg:col-span-2">
        <form action="{{ route('serendipities.update', $serendipity->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- New Section: Image Upload, Comment, and Rating --}}
            <div class="mt-8 pt-8 border-t border-gray-200 space-y-6">
                
            {{-- Photo + Comment/Rating Layout --}}
            <h4 class="text-lg font-medium text-gray-900 mb-4">Share Your Experience</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        {{-- LEFT: One Image Upload --}}
                        <div class="relative w-full max-w-sm mx-auto" x-data="{ preview: null }">
                            <input 
                                type="file" 
                                accept="image/*" 
                                name="image"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                @change="
                                    const file = $event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = e => preview = e.target.result;
                                        reader.readAsDataURL(file);
                                    }
                                "
                            />
                            <div class="aspect-square border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden hover:border-purple-400 hover:bg-purple-50 transition-colors">
                                <template x-if="preview">
                                    <img :src="preview" alt="Preview" class="w-full h-full object-cover rounded-lg">
                                </template>
                                <template x-if="!preview">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </template>
                            </div>
                        </div>

                        {{-- RIGHT: Comment & Rating --}}
                        <div class="space-y-6">
                            {{-- Comment --}}
                            <div>
                                <label for="comment" class="text-lg font-medium text-gray-900 mb-2 block">Your Thoughts</label>
                                <textarea 
                                    id="comment" 
                                    name="comment" 
                                    placeholder="Tell us about your serendipitous moment..."
                                    class="w-full min-h-[100px] resize-none rounded border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none p-3"
                                ></textarea>
                            </div>

                            {{-- Rating --}}
                            <div>
                                <label class="text-lg font-medium text-gray-900 mb-4 block">How was it?</label>
                                <div class="flex space-x-6">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="rating" value="3" class="text-green-600" />
                                        <span class="text-green-600 font-medium">🥰</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="rating" value="2" class="text-yellow-600" />
                                        <span class="text-yellow-600 font-medium">😊</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="rating" value="1" class="text-red-600" />
                                        <span class="text-red-600 font-medium">😣</span>
                                    </label>
                                </div>
                            </div>

                                                {{-- Submit Button --}}
                                    <div class="pt-4">
                                        <button 
                                            type="submit"
                                            class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-2 rounded-full font-medium transition-colors"
                                        >
                                            Completed
                                        </button>
                                    </div>
                        </div>
                    </div>


               
            </div>
        </form>
    </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
<script>
function downloadImageGrid() {
    const node = document.getElementById('image-preview-grid');
    domtoimage.toPng(node)
        .then(function (dataUrl) {
            const link = document.createElement('a');
            link.download = 'serendipity-grid.png';
            link.href = dataUrl;
            link.click();
        })
        .catch(function (error) {
            console.error('Failed to render image grid:', error);
        });
}
</script>





@else
<p class="text-center text-gray-500">No serendipity yet.</p>
@endif