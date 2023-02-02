@extends('layout')

<!-- wrap in section directive -->
@section('content')

<!-- include partial templates for hero and search on listings view -->
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

<!-- php directive helpful for filtering that can't be done in controller or route -->
{{-- @php
    $test=1;
@endphp
{{$test}} --}}

<!--  if conditional directive -->
{{-- @if(count($listings) == 0) 
    <p>No listings found</p>
@endif --}}

<!-- unless directive similar to if -->
@unless(count($listings) == 0) 

<!-- foreach directive in Blade -->
@foreach($listings as $listing)
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <!-- asset helper to show public images -->
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <!-- Eloquent models give collection. $listing['title'] replaced by $listing->title-->
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <ul class="flex">
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Laravel</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">API</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Backend</a>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="#">Vue</a>
                </li>
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</div>
@endforeach

@else 
    <p>No listings found</p>
@endunless 
</div>

@endsection