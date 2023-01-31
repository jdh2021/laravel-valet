<h1>{{$heading}}</h1>

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
    <h2>{{$listing['title']}}</h2>
    <p>{{$listing['description']}}</p>
@endforeach

@else
    <p>No listings found</p>
@endunless