<!-- tags are csv list, takes in tags as props. list should turn into array to be looped over -->
@props(['tagsCsv'])

<!-- php directive -->
@php
    // explode function - takes where to split the string (comma) and prop
    $tags=explode(',', $tagsCsv)
@endphp


<ul class="flex">
    @foreach($tags as $tag)
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <!-- filter listing by tag with query param -->
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
 
</ul>