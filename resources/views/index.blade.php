@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <h1 class="text-2xl text-white font-bold mb-4">All Books</h1>

    
    <form action="{{ route('books.index') }}" method="GET" class="mb-6">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search by title or author"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Search
            </button>
        </div>
    </form>

    

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($book as $b)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl font-semibold">{{ $b->title }}</h2>
                <p class="text-gray-600">Author: {{ $b->author }}</p>
                <p class="text-sm text-gray-500">Published: {{ $b->published_year }}</p>
                
                <div class="mt-4 flex items-center gap-4">
                    <a href="{{ route('books.show', $b->id) }}" class="text-blue-700">View</a>

                    @can('update', $b)
                        <p class="text-red-600">creator</p>
                    @endcan
                </div>

                
            </div>
        @endforeach
    </div>

    
    <div class="mt-6">
        {{ $book->appends(['search' => request('search')])->links() }}
    </div>
</div>
@endsection
