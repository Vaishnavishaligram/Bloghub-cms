@extends('layouts.admin')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('topbar-actions')
<a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">+ New Blog</a>
@endsection
@section('content')
<div class="stats-grid">
    <div class="stat-card green"><div class="stat-num">{{ $stats['total'] }}</div><div class="stat-label">Total Blogs</div></div>
    <div class="stat-card blue"><div class="stat-num">{{ $stats['categories'] }}</div><div class="stat-label">Categories Used</div></div>
    <div class="stat-card red"><div class="stat-num">{{ $stats['today'] }}</div><div class="stat-label">Published Today</div></div>
</div>
@if($stats['latest'])
<div class="card">
    <div class="card-header">
        <h3>📌 Latest Article</h3>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline btn-sm">View All →</a>
    </div>
    <div class="card-body">
        <p style="font-size:.9rem;color:var(--muted);margin-bottom:.3rem">{{ $stats['latest']->category }} — {{ $stats['latest']->published_at ? $stats['latest']->published_at->format('d M Y') : $stats['latest']->created_at->format('d M Y') }}</p>
        <h4 style="font-size:1.05rem;margin-bottom:.5rem">{{ $stats['latest']->title }}</h4>
        <p style="font-size:.85rem;color:var(--muted)">{{ Str::limit($stats['latest']->short_description,180) }}</p>
        <div style="margin-top:.9rem;display:flex;gap:.5rem">
            <a href="{{ route('admin.blogs.edit',$stats['latest']->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{ route('blog.show',$stats['latest']->id) }}" target="_blank" class="btn btn-outline btn-sm">View Live ↗</a>
        </div>
    </div>
</div>
@endif
@endsection
