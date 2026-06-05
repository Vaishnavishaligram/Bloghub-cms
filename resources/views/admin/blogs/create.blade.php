@extends('layouts.admin')
@section('title','New Blog')
@section('page-title','Create New Blog')
@section('topbar-actions')
<a href="{{ route('admin.blogs.index') }}" class="btn btn-outline">← Back to All</a>
@endsection
@section('content')
<div class="card" style="max-width:820px">
    <div class="card-header"><h3>✍️ New Article</h3></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. SSC CGL 2024 Admit Card Released" required>
                @error('title')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                <div class="form-group">
                    <label class="form-label">Category *</label>
                    <select name="category" class="form-control" required>
                        <option value="">— Select category —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category')==$cat?'selected':'' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Publish Date</label>
                    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at',now()->format('Y-m-d\TH:i')) }}">
                    @error('published_at')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Short Description * <small style="font-weight:400">(shown on listing cards, max 500 chars)</small></label>
                <textarea name="short_description" class="form-control" rows="3" placeholder="1–2 sentence summary…" required>{{ old('short_description') }}</textarea>
                @error('short_description')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Full Content * <small style="font-weight:400">(HTML tags supported: &lt;h2&gt; &lt;p&gt; &lt;ul&gt; &lt;ol&gt; &lt;strong&gt; etc.)</small></label>
                <textarea name="content" class="form-control" style="min-height:300px;font-family:monospace;font-size:.82rem" placeholder="Write full article HTML content here…" required>{{ old('content') }}</textarea>
                @error('content')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label class="form-label">Featured Image <small style="font-weight:400">(JPG/PNG/WebP, max 2MB — leave blank to use auto placeholder)</small></label>
                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
                @error('image')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <div style="display:flex;gap:.6rem;margin-top:.5rem">
                <button type="submit" class="btn btn-success">Publish Blog →</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
