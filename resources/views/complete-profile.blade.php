@extends('layout.default')

@section('content')
  
<main class="flex-1 flex flex-col items-center justify-center px-4 py-8">


    <div class="bg-white w-full max-w-xl rounded-xl px-8 py-10 shadow-lg" style="box-shadow: 0 -6px 10px rgba(0, 0, 0, 0.08), 0 6px 10px rgba(0, 0, 0, 0.08);">

            <h2 class="text-2xl font-bold text-center mb-2">Complete Your Profile</h2>
            <p class="text-center text-gray-500 mb-8">
                Tell us a bit more about yourself to personalize your experience!
            </p>

            <form method="POST" action="{{ route('complete-profile') }}" class="space-y-6">
                @csrf

                {{-- Birthday --}}
                <div>
                    <label class="mb-1 block font-medium">Birthday</label>
                    <input type="date" name="birthday" max="{{ date('Y-m-d') }}" class="w-full border border-purple-500 rounded px-4 py-2" required>
                </div>

                {{-- Bio --}}
                <div>
                    <label for="bio" class=" block font-medium">Short Bio</label>
                    <textarea name="bio" id="bio" rows="2" maxlength="250" class="w-full border border-purple-500 rounded px-4 py-2 resize-none" required></textarea>
                    <div class="text-xs text-gray-400 text-right mt-1">
                        <span id="bio-count">0</span>/250
                    </div>
                </div>

                {{-- Hobbies --}}
                <div>
                    <label class="mb-1 block font-medium">Hobbies & Activities</label>

                    {{-- Search --}}
                    <div class="flex items-center mb-3 gap-2">
                        <input type="text" id="search-hobby" placeholder="Search hobbies…" class="pl-3 flex-1 border border-purple-500 rounded px-4 py-2" />
                        <button type="button" id="add-hobby" class=" bg-purple-600 hover:bg-purple-700  text-white px-3 py-2 rounded">Add</button>
                    </div>

                    {{-- Selected Hobbies --}}
                    <div id="selected-hobbies" class="flex flex-wrap gap-10 mb-4">
                        {{-- Dynamically added --}}
                    </div>

                    {{-- Suggestions --}}
                    <div id="suggested-hobbies" class="flex flex-wrap gap-2 text-bold">
                        @foreach ([
                            "Photography", "Traveling", "Cooking", "Hiking",
                            "Music", "Gaming", "Sports", "Art",
                            "Running", "Cycling", "Movies",
                            "Swimming","Writing", "Volunteering", "Fishing"
                        ] as $hobby)
                            <button type="button" class="hobby-suggestion text-sm px-3 py-1 border rounded-full  hover:bg-purple-100" data-hobby="{{ $hobby }}">
                                + {{ $hobby }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Hidden field for selected hobbies --}}
                <input type="hidden" name="hobbies" id="hobbies-input">

                <button type="submit" class="w-full mt-2  bg-purple-600 hover:bg-purple-700 -600 text-white py-2 rounded disabled:opacity-50">
                    Save and Continue
                </button>
            </form>
        </div>
    </main>


</div>
@endsection

@push('scripts')
<script>
    const hobbies = new Set();
    const updateHobbyInput = () => {
        document.getElementById('hobbies-input').value = Array.from(hobbies).join(',');
        renderSelectedHobbies();
    };

    const renderSelectedHobbies = () => {
        const container = document.getElementById('selected-hobbies');
        container.innerHTML = '';
        hobbies.forEach(hobby => {
            const span = document.createElement('span');
            span.className = 'flex items-center bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium border border-blue-200';
            span.innerHTML = `${hobby}
                <button type="button" class="ml-1 w-5 h-5" onclick="removeHobby('${hobby}')">×</button>`;
            container.appendChild(span);
        });
    };

    const removeHobby = (hobby) => {
        hobbies.delete(hobby);
        updateHobbyInput();
    };

    document.getElementById('add-hobby').addEventListener('click', () => {
        const input = document.getElementById('custom-hobby');
        const hobby = input.value.trim();
        if (hobby && !hobbies.has(hobby)) {
            hobbies.add(hobby);
            updateHobbyInput();
            input.value = '';
        }
    });

    document.querySelectorAll('.hobby-suggestion').forEach(button => {
        button.addEventListener('click', () => {
            const hobby = button.dataset.hobby;
            if (!hobbies.has(hobby)) {
                hobbies.add(hobby);
                updateHobbyInput();
            }
        });
    });

    document.getElementById('bio').addEventListener('input', (e) => {
        document.getElementById('bio-count').innerText = e.target.value.length;
    });
</script>
@endpush
