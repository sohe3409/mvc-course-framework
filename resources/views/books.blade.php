@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach ($books as $book)
            <div class="container">
                <h2>{{ $book['title'] }}</h2>
                <p>Author: {{ $book['author'] }}</p>
                <p>ISBN: {{ $book['isbn'] }}</p>
                <img src="{{ $book['picture'] }}" class="book-img">
          </div>
        @endforeach
    </div>
@endsection
