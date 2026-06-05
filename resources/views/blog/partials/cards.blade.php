<span data-total="{{ $blogs->total() }}" style="display:none"></span>
<div class="pagination-html" style="display:none">{{ $blogs->links() }}</div>
@forelse($blogs as $blog)
@php
$catSlug=strtolower(str_replace(' ','-',$blog->category));
$badgeMap=['admit-card'=>'badge-admit','result'=>'badge-result','syllabus'=>'badge-syllabus','answer-key'=>'badge-answer','recruitment'=>'badge-recruit','exam-date'=>'badge-exam','general'=>'badge-general'];
$bc=$badgeMap[$catSlug]??'badge-general';
@endphp
<article class="blog-card">
    <img src="{{ $blog->image_url }}" alt="{{ e($blog->title) }}" class="card-img" loading="lazy" onerror="this.src='https://picsum.photos/seed/{{ $blog->id }}x/800/450'">
    <div class="card-body">
        <div class="card-meta">
            <span class="badge {{ $bc }}">{{ $blog->category }}</span>
            <span class="card-date">{{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}</span>
        </div>
        <h2 class="card-title"><a href="{{ route('blog.show',$blog->id) }}">{{ $blog->title }}</a></h2>
        <p class="card-desc">{{ Str::limit($blog->short_description,140) }}</p>
        <div class="card-footer"><a href="{{ route('blog.show',$blog->id) }}">Read full article →</a></div>
    </div>
</article>
@empty
<div class="empty-state"><h3>No articles found</h3><p>Try a different category, date, or search term.</p></div>
@endforelse
