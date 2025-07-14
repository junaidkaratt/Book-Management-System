@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6">
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>

        <p class="text-gray-700 mb-2"><span class="font-semibold">Author:</span> {{ $book->author }}</p>
        <p class="text-gray-700 mb-2"><span class="font-semibold">Published Year:</span> {{ $book->published_year }}</p>
        
        @if($book->description)
            <p class="text-gray-700 mb-4"><span class="font-semibold">Description:</span> {{ $book->description }}</p>
        @endif

        <div class="flex gap-4 mt-6">
            <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>

            @can('update', $book)
                <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>

                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                        Delete
                    </button>
                </form>
            @endcan
        </div>
    </div>
</div>
@endsection
