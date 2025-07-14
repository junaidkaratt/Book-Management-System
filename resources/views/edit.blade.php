@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Book</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Author</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Published Year</label>
            <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" required
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('books.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Update Book
            </button>
        </div>
    </form>
</div>
@endsection
