@extends('layouts.admin')
@section('title','All Blogs')
@section('page-title','All Blogs')
@section('topbar-actions')
<a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">+ New Blog</a>
@endsection
@section('content')
<div class="card">
    <div class="card-header"><h3>📝 Blog Articles ({{ $blogs->total() }})</h3></div>
    <div class="table-wrap">
        <table class="admin-table">
            <thead><tr><th>#</th><th>Title</th><th>Category</th><th>Date</th><th>Actions</th></tr></thead>
            <tbody>
            @forelse($blogs as $blog)
            <tr>
                <td style="color:var(--muted);width:50px">{{ $blog->id }}</td>
                <td>
                    <span style="font-weight:600">{{ Str::limit($blog->title,60) }}</span><br>
                    <span style="font-size:.75rem;color:var(--muted)">{{ Str::limit($blog->short_description,80) }}</span>
                </td>
                <td><span style="display:inline-block;padding:.18rem .6rem;border-radius:4px;font-size:.72rem;font-weight:700;background:rgba(200,57,43,.15);color:#f85149">{{ $blog->category }}</span></td>
                <td style="font-size:.82rem;color:var(--muted);white-space:nowrap">{{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}</td>
                <td>
                    <div style="display:flex;gap:.4rem;flex-wrap:wrap">
                        <a href="{{ route('admin.blogs.edit',$blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('blog.show',$blog->id) }}" target="_blank" class="btn btn-outline btn-sm">View</a>
                        <form method="POST" action="{{ route('admin.blogs.destroy',$blog->id) }}" onsubmit="return confirm('Delete this blog permanently?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:2.5rem;color:var(--muted)">No blogs yet. <a href="{{ route('admin.blogs.create') }}" style="color:var(--accent)">Create the first one →</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div style="margin-top:1.2rem">{{ $blogs->links() }}</div>
@endsection
