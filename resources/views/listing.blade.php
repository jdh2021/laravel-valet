@extends('layout')

<!-- wrap in section directive -->
@section('content')

<!-- include partial template for search -->
@include('partials._search')

<h2>{{$listing['title']}}</h2>
<p>{{$listing['description']}}</p>

@endsection