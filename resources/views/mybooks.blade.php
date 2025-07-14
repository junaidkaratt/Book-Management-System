@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-white mb-4"> My Books</h1>

    <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-6 inline-block">Add New Book</a>
    
    @if ($book->isEmpty())
        <p class="text-gray-500">You haven't added any books yet.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($book as $book)
                <div class="p-4 bg-white shadow rounded">
                    <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                    <p class="text-gray-600">Author: {{ $book->author }}</p>
                    <p class="text-sm text-gray-500">Year: {{ $book->published_year }}</p>

                    <a href="{{ route('books.show', $book->id) }}" class="text-blue-500">View</a>
                    
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
