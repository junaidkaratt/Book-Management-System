<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use App\Policies\BookPolicy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use AuthorizesRequests;

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('search')) 
        {
            $searchTerm = $request->search;  

            
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')  
                    ->orWhere('author', 'like', '%' . $searchTerm . '%');  
            });
        }

        $book = $query->paginate(12);

        return view('index', compact('book'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'author'=>'required|string|max:255',
            'published_year'=>'required|integer|min:1450|max:' . date('Y'),
            'description'=>'nullable|string'

        ]);
        $validated['user_id'] = Auth::id();

        Book::create($validated);

        return redirect()->route('books.index')->with('success','Book successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book= Book::findOrFail($id);
        return view('show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id); 
        $this->authorize('update', $book);
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'author'=>'required|string|max:255',
            'published_year'=>'required|integer|min:1450|max:' . date('Y'),
            'description'=>'nullable|string'

        ]);
        $book = Book::findOrFail($id);
        
        $book->update($validated);

        return redirect()->route('books.index')->with('success','Book details successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('delete', $book);
        $book->delete();

        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }

    public function mybook()
    {
        $book = Book::where('user_id',Auth::id())->get();
        return view('mybooks',compact('book'));
    }
}
