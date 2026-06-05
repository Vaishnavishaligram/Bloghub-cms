@extends('layouts.admin')
@section('title','Edit Blog')
@section('page-title','Edit Blog #'.$blog->id)
@section('topbar-actions')
<a href="{{ route('admin.blogs.index') }}" class="btn btn-outline">← Back to All</a>
@endsection
@section('content')
<div class="card" style="max-width:820px">
    <div class="card-header">
        <h3>✏️ Editing: {{ Str::limit($blog->title,50) }}</h3>
        <a href="{{ route('blog.show',$blog->id) }}" target="_blank" class="btn btn-outline btn-sm">View Live ↗</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.blogs.update',$blog->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title',$blog->title) }}" required>
                @error('title')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                <div class="form-group">
                    <label class="form-label">Category *</label>
                    <select name="category" class="form-control" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category',$blog->category)==$cat?'selected':'' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Publish Date</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at',$blog->published_at?$blog->published_at->format('Y-m-d\TH:i'):'') }}">
                    @error('published_at')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Short Description *</label>
                <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description',$blog->short_description) }}</textarea>
                @error('short_description')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Full Content * <small style="font-weight:400">(HTML supported)</small></label>
                <textarea name="content" class="form-control" style="min-height:300px;font-family:monospace;font-size:.82rem" required>{{ old('content',$blog->content) }}</textarea>
                @error('content')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Current Image</label>
                @if($blog->image)
                    <div style="margin-bottom:.6rem">
                        <img src="{{ asset('uploads/'.$blog->image) }}" alt="Current image" style="height:100px;border-radius:6px;border:1px solid var(--border)" onerror="this.style.display='none'">
                        <p style="font-size:.75rem;color:var(--muted);margin-top:.3rem">{{ $blog->image }}</p>
                    </div>
                @else
                    <p style="font-size:.82rem;color:var(--muted);margin-bottom:.5rem">Using auto-placeholder (no custom image)</p>
                @endif
                <label class="form-label">Replace Image <small style="font-weight:400">(leave blank to keep existing)</small></label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @error('image')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div style="display:flex;gap:.6rem;margin-top:.5rem;align-items:center">
                <button type="submit" class="btn btn-success">Save Changes →</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline">Cancel</a>
                <form method="POST" action="{{ route('admin.blogs.destroy',$blog->id) }}" onsubmit="return confirm('Permanently delete this blog?')" style="margin-left:auto">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Blog</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection
