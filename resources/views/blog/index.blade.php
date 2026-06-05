@extends('layouts.app')
@section('title','BlogHub — All Blogs')
@push('styles')
<style>
.hero{background:var(--ink);color:#fff;padding:3.5rem 1.5rem;text-align:center;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;inset:0;background:repeating-linear-gradient(45deg,transparent,transparent 40px,rgba(255,255,255,.02) 40px,rgba(255,255,255,.02) 80px)}
.hero h1{font-family:var(--font-head);font-size:clamp(2rem,5vw,3.2rem);font-weight:900;margin-bottom:.6rem;position:relative}
.hero h1 em{color:var(--accent);font-style:normal}
.hero p{color:#aaa;font-size:1rem;position:relative}
.filter-bar{background:var(--paper);border-bottom:1px solid var(--border);padding:1.2rem 0;position:sticky;top:65px;z-index:90;box-shadow:0 2px 12px rgba(0,0,0,.05)}
.filter-inner{max-width:1180px;margin:auto;padding:0 1.5rem;display:flex;flex-wrap:wrap;gap:.7rem;align-items:center}
.filter-label{font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:var(--muted)}
.cat-pill{padding:.38rem .9rem;border-radius:100px;border:2px solid var(--border);background:transparent;font-family:var(--font);font-size:.82rem;font-weight:600;cursor:pointer;transition:all .2s;color:var(--ink)}
.cat-pill:hover,.cat-pill.active{background:var(--ink);border-color:var(--ink);color:#fff}
.search-row{display:flex;flex-wrap:wrap;gap:.7rem;align-items:center;margin-left:auto}
.search-row input{padding:.42rem .9rem;border:2px solid var(--border);border-radius:8px;font-family:var(--font);font-size:.85rem;outline:none;transition:border-color .2s;background:var(--cream)}
.search-row input:focus{border-color:var(--ink)}
#searchInput{min-width:200px}
#dateFilter{width:155px}
.blog-section{padding:2.5rem 0 4rem}
.results-meta{font-size:.85rem;color:var(--muted);margin-bottom:1.5rem}
.results-meta strong{color:var(--ink)}
#blogGrid{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1.8rem}
.blog-card{background:var(--paper);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow);border:1px solid var(--border);display:flex;flex-direction:column;transition:transform .25s,box-shadow .25s}
.blog-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(0,0,0,.12)}
.card-img{width:100%;height:200px;object-fit:cover;display:block}
.card-body{padding:1.2rem 1.3rem;flex:1;display:flex;flex-direction:column}
.card-meta{display:flex;align-items:center;gap:.6rem;margin-bottom:.65rem;flex-wrap:wrap}
.card-date{font-size:.75rem;color:var(--muted)}
.card-title{font-family:var(--font-head);font-size:1.1rem;font-weight:700;line-height:1.35;margin-bottom:.5rem;color:var(--ink)}
.card-title a{text-decoration:none;color:inherit;transition:color .2s}
.card-title a:hover{color:var(--accent)}
.card-desc{font-size:.87rem;color:var(--muted);line-height:1.55;flex:1;margin-bottom:1rem}
.card-footer{border-top:1px solid var(--border);padding-top:.8rem;margin-top:auto}
.card-footer a{font-size:.85rem;font-weight:600;color:var(--accent);text-decoration:none}
.card-footer a:hover{text-decoration:underline}
.empty-state{text-align:center;padding:4rem 1.5rem;grid-column:1/-1}
.empty-state h3{font-family:var(--font-head);font-size:1.5rem;margin-bottom:.5rem}
.empty-state p{color:var(--muted)}
#ajaxLoader{display:none;text-align:center;padding:3rem;grid-column:1/-1}
.spinner{width:36px;height:36px;border:3px solid var(--border);border-top-color:var(--accent);border-radius:50%;animation:spin .7s linear infinite;margin:auto}
@keyframes spin{to{transform:rotate(360deg)}}
.pagination-wrap{margin-top:2.5rem;display:flex;justify-content:center}
@media(max-width:600px){.filter-inner{gap:.5rem}.search-row{margin-left:0;width:100%}#searchInput{flex:1;min-width:0}#blogGrid{grid-template-columns:1fr}}
</style>
@endpush
@section('content')
<div class="hero">
    <h1>Latest Exam <em>Updates</em> & News</h1>
    <p>Admit Cards · Results · Recruitment · Syllabus — all in one place</p>
</div>
<div class="filter-bar">
    <div class="filter-inner">
        <span class="filter-label">Filter:</span>
        <button class="cat-pill active" data-cat="all">All</button>
        @foreach($categories as $cat)
            <button class="cat-pill" data-cat="{{ $cat }}">{{ $cat }}</button>
        @endforeach
        <div class="search-row">
            <input type="search" id="searchInput" placeholder="🔍 Search blogs…">
            <input type="date" id="dateFilter" title="Filter by date">
        </div>
    </div>
</div>
<section class="blog-section">
    <div class="container">
        <p class="results-meta">Showing <strong id="blogCount">{{ $blogs->total() }}</strong> article(s)</p>
        <div id="blogGrid">
            <div id="ajaxLoader"><div class="spinner"></div></div>
            @include('blog.partials.cards', ['blogs' => $blogs])
        </div>
        <div class="pagination-wrap" id="paginationWrap">{{ $blogs->links() }}</div>
    </div>
</section>
@endsection
@push('scripts')
<script>
$(function(){
    var currentCat='all', currentDate='', searchTimer=null;
    $(document).on('click','.cat-pill',function(){
        $('.cat-pill').removeClass('active');
        $(this).addClass('active');
        currentCat=$(this).data('cat');
        doFilter();
    });
    $('#dateFilter').on('change',function(){currentDate=$(this).val();doFilter();});
    $('#searchInput').on('input',function(){clearTimeout(searchTimer);searchTimer=setTimeout(doFilter,350);});
    function doFilter(){
        $('#ajaxLoader').show();
        $('#blogGrid .blog-card, #blogGrid .empty-state').fadeOut(100,function(){$(this).remove();});
        $('#paginationWrap').html('');
        $.ajax({
            url:'{{ route("blog.filter") }}',
            method:'GET',
            data:{category:currentCat,date:currentDate,search:$('#searchInput').val()},
            headers:{'X-Requested-With':'XMLHttpRequest'},
            success:function(html){
                var $temp=$('<div>').html(html);
                var cards=$temp.find('.blog-card, .empty-state');
                var count=$temp.find('[data-total]').data('total')||0;
                var pagHtml=$temp.find('.pagination-html').html()||'';
                $('#ajaxLoader').hide();
                cards.hide().appendTo('#blogGrid').fadeIn(250);
                $('#blogCount').text(count);
                $('#paginationWrap').html(pagHtml);
            },
            error:function(){$('#ajaxLoader').hide();alert('Filter failed. Please try again.');}
        });
    }
});
</script>
@endpush
