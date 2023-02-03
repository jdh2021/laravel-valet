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
    <!-- access listing card component, bind variable to prop with : -->
    <x-listing-card :listing="$listing"/>
@endforeach

@else 
    <p>No listings found</p>
@endunless 
</div>

@endsection