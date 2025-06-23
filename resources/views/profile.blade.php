
@extends('layout.default')

@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col">
    
   

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">My Profile</h1>
            <p class="text-gray-600">Track your serendipitous journey</p>
        </div>

        <div class="space-y-8">
            {{-- Current Serendipity Highlight --}}
            @include('layout.current-serendipity', ['serendipity' => $currentSerendipity])

            {{-- Past Serendipities --}}
            @include('layout.past-serendipity', ['serendipities' => $pastSerendipities])
        </div>
    </div>

  
</div>



@endsection

