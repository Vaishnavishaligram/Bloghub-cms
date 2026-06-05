@extends('layouts.app')
@section('title',$blog->title.' — BlogHub')
@push('styles')
<style>
.detail-wrap{max-width:1180px;margin:3rem auto;padding:0 1.5rem;display:grid;grid-template-columns:1fr 300px;gap:2.5rem;align-items:start}
@media(max-width:900px){.detail-wrap{grid-template-columns:1fr}.sidebar{order:2}.article-col{order:1}}
.breadcrumb{font-size:.8rem;color:var(--muted);margin-bottom:1.5rem}
.breadcrumb a{color:var(--accent);text-decoration:none}
.article-hero-img{width:100%;max-height:420px;object-fit:cover;border-radius:var(--radius);margin-bottom:1.5rem;display:block}
.article-meta{display:flex;flex-wrap:wrap;align-items:center;gap:.7rem;margin-bottom:1.2rem}
.meta-date{font-size:.82rem;color:var(--muted)}
.article-title{font-family:var(--font-head);font-size:clamp(1.6rem,4vw,2.4rem);font-weight:900;line-height:1.2;margin-bottom:1rem}
.article-short-desc{font-size:1.05rem;color:#444;border-left:4px solid var(--accent);padding-left:1rem;margin-bottom:1.8rem;font-style:italic;line-height:1.6}
.article-body{line-height:1.8}
.article-body h2{font-family:var(--font-head);font-size:1.45rem;margin:1.8rem 0 .7rem;border-bottom:2px solid var(--border);padding-bottom:.4rem}
.article-body h3{font-size:1.1rem;margin:1.4rem 0 .5rem;color:var(--accent2)}
.article-body p{margin-bottom:1.1rem}
.article-body ul,.article-body ol{padding-left:1.4rem;margin-bottom:1.1rem}
.article-body li{margin-bottom:.35rem}
.sidebar{position:sticky;top:90px}
.sidebar-box{background:var(--paper);border-radius:var(--radius);border:1px solid var(--border);padding:1.3rem;margin-bottom:1.5rem}
.sidebar-box h4{font-family:var(--font-head);font-size:1rem;font-weight:700;margin-bottom:1rem;padding-bottom:.5rem;border-bottom:2px solid var(--border)}
.sidebar-search{display:flex;gap:.4rem}
.sidebar-search input{flex:1;padding:.45rem .75rem;border:2px solid var(--border);border-radius:6px;font-family:var(--font);font-size:.85rem;outline:none}
.sidebar-search input:focus{border-color:var(--ink)}
.sidebar-search button{padding:.45rem .75rem;background:var(--accent);color:#fff;border:none;border-radius:6px;cursor:pointer}
.related-item{display:flex;gap:.75rem;margin-bottom:1rem;padding-bottom:1rem;border-bottom:1px solid var(--border);align-items:flex-start}
.related-item:last-child{border-bottom:none;margin-bottom:0;padding-bottom:0}
.related-thumb{width:65px;height:50px;object-fit:cover;border-radius:5px;flex-shrink:0}
.related-info a{font-size:.83rem;font-weight:600;color:var(--ink);text-decoration:none;line-height:1.35;display:block;margin-bottom:.2rem}
.related-info a:hover{color:var(--accent)}
.related-date{font-size:.72rem;color:var(--muted)}
.cat-pills-grid{display:flex;flex-wrap:wrap;gap:.4rem}
.cat-pills-grid a{display:inline-block;padding:.28rem .7rem;border:1px solid var(--border);border-radius:100px;font-size:.78rem;font-weight:600;color:var(--ink);text-decoration:none;transition:all .15s}
.cat-pills-grid a:hover{background:var(--ink);color:#fff;border-color:var(--ink)}
.back-link{display:inline-flex;align-items:center;gap:.4rem;font-size:.88rem;color:var(--muted);text-decoration:none;margin-top:2rem}
.back-link:hover{color:var(--ink)}
</style>
@endpush
@section('content')
<div class="detail-wrap">
    <div class="article-col">
        <nav class="breadcrumb">
            <a href="{{ route('blog.index') }}">Home</a> &rsaquo;
            <a href="{{ route('blog.index') }}?category={{ urlencode($blog->category) }}">{{ $blog->category }}</a> &rsaquo;
            {{ Str::limit($blog->title,55) }}
        </nav>
        <img src="{{ $blog->image_url }}" alt="{{ e($blog->title) }}" class="article-hero-img" onerror="this.src='https://picsum.photos/seed/{{ $blog->id }}b/1200/600'">
        <div class="article-meta">
            @php
            $catSlug=strtolower(str_replace(' ','-',$blog->category));
            $badgeMap=['admit-card'=>'badge-admit','result'=>'badge-result','syllabus'=>'badge-syllabus','answer-key'=>'badge-answer','recruitment'=>'badge-recruit','exam-date'=>'badge-exam','general'=>'badge-general'];
            $bc=$badgeMap[$catSlug]??'badge-general';
            @endphp
            <span class="badge {{ $bc }}">{{ $blog->category }}</span>
            <span class="meta-date">📅 {{ $blog->published_at ? $blog->published_at->format('d F Y') : $blog->created_at->format('d F Y') }}</span>
        </div>
        <h1 class="article-title">{{ $blog->title }}</h1>
        <p class="article-short-desc">{{ $blog->short_description }}</p>
        <div class="article-body">{!! $blog->content !!}</div>
        <a href="{{ route('blog.index') }}" class="back-link">← Back to all articles</a>
    </div>
    <aside class="sidebar">
        <div class="sidebar-box">
            <h4>🔍 Search</h4>
            <form class="sidebar-search" action="{{ route('blog.index') }}" method="GET">
                <input type="search" name="search" placeholder="Search articles…">
                <button type="submit">Go</button>
            </form>
        </div>
        <div class="sidebar-box">
            <h4>📂 Categories</h4>
            <div class="cat-pills-grid">
                @foreach(\App\Models\Blog::categories() as $cat)
                    <a href="{{ route('blog.index') }}?category={{ urlencode($cat) }}">{{ $cat }}</a>
                @endforeach
            </div>
        </div>
        @if($related->isNotEmpty())
        <div class="sidebar-box">
            <h4>📌 Related Articles</h4>
            @foreach($related as $rel)
            <div class="related-item">
                <img src="{{ $rel->image_url }}" alt="{{ e($rel->title) }}" class="related-thumb" onerror="this.src='https://picsum.photos/seed/r{{ $rel->id }}/200/150'">
                <div class="related-info">
                    <a href="{{ route('blog.show',$rel->id) }}">{{ Str::limit($rel->title,65) }}</a>
                    <span class="related-date">{{ $rel->published_at ? $rel->published_at->format('d M Y') : $rel->created_at->format('d M Y') }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </aside>
</div>
@endsection
