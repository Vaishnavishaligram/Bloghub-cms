<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /* ── Auth ─────────────────────────────────────────── */

    public function loginForm()
    {
        if (Session::get('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $validEmail    = env('ADMIN_EMAIL', 'admin@blog.com');
        $validPassword = env('ADMIN_PASSWORD', 'admin123');

        if ($request->email === $validEmail && $request->password === $validPassword) {
            Session::put('admin_logged_in', true);
            Session::put('admin_email', $request->email);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function logout()
    {
        Session::forget(['admin_logged_in', 'admin_email']);
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    /* ── Dashboard ────────────────────────────────────── */

    public function dashboard()
    {
        $stats = [
            'total'      => Blog::count(),
            'categories' => Blog::distinct('category')->count('category'),
            'today'      => Blog::whereDate('created_at', today())->count(),
            'latest'     => Blog::latest('published_at')->first(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    /* ── Blog CRUD ────────────────────────────────────── */

    public function index()
    {
        $blogs = Blog::latest('published_at')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Blog::categories();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'content'           => 'required|string',
            'short_description' => 'required|string|max:500',
            'category'          => 'required|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'published_at'      => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        }

        $data['published_at'] = $data['published_at'] ?? now();
        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog published successfully!');
    }

    public function edit($id)
    {
        $blog       = Blog::findOrFail($id);
        $categories = Blog::categories();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $data = $request->validate([
            'title'             => 'required|string|max:255',
            'content'           => 'required|string',
            'short_description' => 'required|string|max:500',
            'category'          => 'required|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'published_at'      => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
                @unlink(public_path('uploads/' . $blog->image));
            }
            $file     = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads'), $filename);
            $data['image'] = $filename;
        } else {
            unset($data['image']); // keep existing
        }

        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
            @unlink(public_path('uploads/' . $blog->image));
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted.');
    }
}
