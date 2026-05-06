@if ($serendipity)

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');
    
    .font-display {
        font-family: 'Syne', sans-serif;
    }
    
    .glass-input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .glass-input:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(168, 85, 247, 0.5);
        outline: none;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1);
    }
    
    .glass-input::placeholder {
        color: rgba(229, 231, 235, 0.6);
    }
    
    .rating-option {
        transition: all 0.3s ease;
    }
    
    .rating-option:hover {
        transform: scale(1.1);
    }
    
    .badge-success {
        background: rgba(16, 185, 129, 0.2);
        border: 1px solid rgba(16, 185, 129, 0.3);
        color: #6ee7b7;
    }
</style>

<div class="current-serendipity-container">
    {{-- Header --}}
    <div class="pb-6 border-b border-gray-700/50 mb-8">
        <div class="flex items-center space-x-3">
            <div class="p-2 rounded-lg bg-gradient-to-br from-purple-500/20 to-pink-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold font-display text-white">Current Serendipity</h2>
                <p class="text-sm text-gray-400 mt-1">Complete your ongoing moment</p>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        {{-- Image Section --}}
        <div class="relative group">
            <div class="relative w-full aspect-square rounded-2xl overflow-hidden border border-gray-700/50 hover:border-purple-500/50 transition-all duration-300">
                <img
                    src="{{ $serendipity->imgurl ?? asset('images/serendipity_cover.jpg') }}"
                    alt="Current serendipity"
                    class="w-full h-full object-cover"
                />
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4 badge-success rounded-full p-3 flex items-center space-x-2 backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    <span class="text-xs font-semibold">Ongoing</span>
                </div>
            </div>
        </div>

        {{-- Text Content --}}
        <div class="flex flex-col justify-between">
            <div class="space-y-5">
                <div>
                    <h3 class="text-3xl font-bold font-display text-white mb-3">
                        {{ $serendipity->activity }}
                    </h3>
                    <p class="text-gray-300 leading-relaxed text-base">
                        {{ $serendipity->description }}
                    </p>
                </div>

                {{-- Meta Info --}}
                <div class="space-y-3 pt-4 border-t border-gray-700/50">
                    <div class="flex items-center space-x-3 text-sm">
                        <div class="p-2 rounded-lg bg-white/10">
                            @if($serendipity->completed_at == null)
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            @endif
                        </div>
                        <span class="text-gray-300">{{ \Carbon\Carbon::parse($serendipity->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form Section --}}
    <form action="{{ route('serendipities.update', $serendipity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="pt-8 border-t border-gray-700/50 space-y-8">
            <div>
                <h4 class="text-2xl font-bold font-display text-white mb-6">Share Your Experience</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- LEFT: Image Upload --}}
                    <div class="relative w-full" x-data="{ preview: null }">
                        <label class="block text-sm font-semibold text-gray-300 mb-3 uppercase tracking-wide">Upload Photo</label>
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
                        <div class="aspect-square border-2 border-dashed border-gray-600 rounded-2xl flex items-center justify-center overflow-hidden hover:border-purple-500 hover:bg-purple-500/10 transition-all duration-300 cursor-pointer group">
                            <template x-if="preview">
                                <img :src="preview" alt="Preview" class="w-full h-full object-cover rounded-xl">
                            </template>
                            <template x-if="!preview">
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-500 mx-auto mb-3 group-hover:text-purple-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <p class="text-gray-400 text-sm">Click to upload</p>
                                </div>
                            </template>
                        </div>
                    </div>

                    {{-- RIGHT: Comment & Rating --}}
                    <div class="space-y-6">
                        {{-- Comment --}}
                        <div>
                            <label for="comment" class="block text-sm font-semibold text-gray-300 mb-3 uppercase tracking-wide">Your Thoughts</label>
                            <textarea 
                                id="comment" 
                                name="comment" 
                                placeholder="Tell us about your serendipitous moment..."
                                class="glass-input w-full min-h-[120px] resize-none rounded-lg p-4 placeholder-gray-500"
                            ></textarea>
                        </div>

                        {{-- Location (Toggle) --}}
                        <div>
                            <button type="button" class="text-sm font-semibold text-purple-400 hover:text-purple-300 transition-colors mb-2 uppercase tracking-wide" onclick="document.getElementById('location-input').classList.toggle('hidden')">
                                + Add Location
                            </button>
                            <div id="location-input" class="hidden space-y-2">
                                <input 
                                    name="location" 
                                    placeholder="Where is your serendipitous moment?"
                                    class="glass-input w-full rounded-lg p-3 text-sm"
                                />
                            </div>
                        </div>

                        {{-- Rating --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-4 uppercase tracking-wide">How was it?</label>
                            <div class="flex gap-6">
                                {{-- Fun --}}
                                <label class="rating-option flex flex-col items-center cursor-pointer">
                                    <input type="radio" name="rating" value="3" class="sr-only peer" />
                                    <div class="p-4 rounded-xl bg-gradient-to-br from-green-500/20 to-emerald-500/20 border border-green-500/30 text-2xl peer-checked:from-green-500 peer-checked:to-emerald-600 peer-checked:border-green-400 transition-all duration-300">
                                        🤩
                                    </div>
                                    <span class="mt-2 text-xs font-semibold text-gray-400 peer-checked:text-green-400">Fun</span>
                                </label>

                                {{-- Mid --}}
                                <label class="rating-option flex flex-col items-center cursor-pointer">
                                    <input type="radio" name="rating" value="2" class="sr-only peer" />
                                    <div class="p-4 rounded-xl bg-gradient-to-br from-yellow-500/20 to-orange-500/20 border border-yellow-500/30 text-2xl peer-checked:from-yellow-500 peer-checked:to-orange-600 peer-checked:border-yellow-400 transition-all duration-300">
                                        😐
                                    </div>
                                    <span class="mt-2 text-xs font-semibold text-gray-400 peer-checked:text-yellow-400">Mid</span>
                                </label>

                                {{-- Nah --}}
                                <label class="rating-option flex flex-col items-center cursor-pointer">
                                    <input type="radio" name="rating" value="1" class="sr-only peer" />
                                    <div class="p-4 rounded-xl bg-gradient-to-br from-red-500/20 to-rose-500/20 border border-red-500/30 text-2xl peer-checked:from-red-500 peer-checked:to-rose-600 peer-checked:border-red-400 transition-all duration-300">
                                        😤
                                    </div>
                                    <span class="mt-2 text-xs font-semibold text-gray-400 peer-checked:text-red-400">Nah</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="pt-6 border-t border-gray-700/50">
                <button 
                    type="submit"
                    class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-purple-500/20 flex items-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Mark as Completed
                </button>
            </div>
        </div>
    </form>
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
<div class="text-center py-12">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-500 mx-auto mb-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10a4 4 0 118 0 4 4 0 01-8 0zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <p class="text-gray-400">No serendipity yet.</p>
</div>
@endif