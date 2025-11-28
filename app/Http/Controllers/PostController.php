<?php

namespace App\Http\Controllers;

use App\Events\UserView;
use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Mail\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Posts from DB
        $posts = Post::with('author')->latest()->simplePaginate(6);
        event(new UserView(request()));
        // Send results to view
        return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tag' => 'string|max:16'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'tag' => $request->tag,
            'author_id' => Auth::id()
        ]);

        // Mailing
        Mail::to($post->author)->send(new PostPublished($post));

        return redirect()->route('posts.index')->with('success', 'Публікація створена!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch requested record
        $post = Post::with('author')->find($id);
        // Send result to view
        return view('posts/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Authorisation
        if ($post->author_id === Auth::id())
        {
            return view('posts.edit', ['post' => $post]);
        }
        else
        {
            return abort(403, 'Доступ заборонено');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (! $request->author_id === Auth::id())
        {
            return abort(401, 'Немає прав на виконання операції.');
        }

        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tag' => 'string|max:16'
        ]);

        // Updating
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'tag' => $request->tag
        ]);

        // Redirecting
        return redirect()->route('profile')->with('success', 'Публікація оновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Security check
        if (! $post->author_id === Auth::id())
        {
            return abort(401, 'Немає прав на виконання операції.');
        }

        // Delete operation
        $post->delete();

        // Redirecting
        return redirect()->route('profile')->with('success', 'Публікація видалена!');
    }

    /**
     * Implements a live-search
     */
    public function search(SearchPostRequest $request)
    {
        $user = Auth::user();
        if (! $user) {
            return response()->json(['error' => 'Ви не авторизовані для даного запиту'], 401);
        }
        $query = $request->input('query');

        // Знаходимо пости користувача, де збігається назва
        $posts = Post::where('author_id', $user->id)
            ->where('title', 'like', '%' . $query . '%')
            ->limit(5)
            ->get(['id', 'title']); // беремо лише потрібні поля

        // Повертаємо JSON для JS
        return response()->json($posts);
    }
}
