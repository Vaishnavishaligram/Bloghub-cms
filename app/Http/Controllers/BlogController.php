<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs      = Blog::latest('published_at')->paginate(9);
        $categories = Blog::categories();
        return view('blog.index', compact('blogs', 'categories'));
    }

    public function show($id)
    {
        $blog    = Blog::findOrFail($id);
        $related = Blog::where('category', $blog->category)
                       ->where('id', '!=', $id)
                       ->latest('published_at')
                       ->limit(3)->get();
        return view('blog.show', compact('blog', 'related'));
    }

    /**
     * AJAX endpoint — returns rendered HTML fragment only
     */
    public function filter(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        if ($request->filled('date')) {
            $query->byDate($request->date);
        }
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        $blogs = $query->latest('published_at')->paginate(9);
        return view('blog.partials.cards', compact('blogs'))->render();
    }
}
