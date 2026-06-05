<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BlogHub — Exam News')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        :root{--ink:#0f0f0f;--cream:#faf7f2;--paper:#ffffff;--accent:#c8392b;--accent2:#1a3a5c;--muted:#6b7280;--border:#e5e0d8;--shadow:0 2px 20px rgba(0,0,0,.08);--radius:10px;--font-head:'Playfair Display',serif;--font:'DM Sans',sans-serif}
        body{font-family:var(--font);background:var(--cream);color:var(--ink);line-height:1.65}
        .topbar{background:var(--accent2);color:#fff;font-size:.75rem;letter-spacing:.5px;padding:.35rem 0;text-align:center}
        header.site-header{background:var(--paper);border-bottom:3px solid var(--ink);padding:1rem 0;position:sticky;top:0;z-index:100;box-shadow:0 2px 8px rgba(0,0,0,.06)}
        .header-inner{max-width:1180px;margin:auto;padding:0 1.5rem;display:flex;align-items:center;justify-content:space-between;gap:1rem}
        .site-logo{font-family:var(--font-head);font-size:1.8rem;font-weight:900;color:var(--ink);text-decoration:none;line-height:1}
        .site-logo span{color:var(--accent)}
        nav.main-nav a{font-size:.9rem;font-weight:500;color:var(--ink);text-decoration:none;margin-left:1.5rem;transition:color .2s}
        nav.main-nav a:hover{color:var(--accent)}
        .hamburger{display:none;background:none;border:2px solid var(--ink);border-radius:4px;padding:.3rem .5rem;cursor:pointer;font-size:1.1rem}
        .container{max-width:1180px;margin:auto;padding:0 1.5rem}
        .btn{display:inline-block;padding:.5rem 1.2rem;border-radius:6px;font-family:var(--font);font-size:.9rem;font-weight:600;cursor:pointer;border:none;text-decoration:none;transition:all .2s}
        .btn-primary{background:var(--accent);color:#fff}.btn-primary:hover{background:#a32418}
        .btn-outline{background:transparent;border:2px solid var(--ink);color:var(--ink)}.btn-outline:hover{background:var(--ink);color:var(--paper)}
        .badge{display:inline-block;padding:.2rem .65rem;border-radius:100px;font-size:.7rem;font-weight:700;letter-spacing:.5px;text-transform:uppercase}
        .badge-admit{background:#fef3c7;color:#92400e}.badge-result{background:#dcfce7;color:#166534}
        .badge-syllabus{background:#dbeafe;color:#1e40af}.badge-answer{background:#fce7f3;color:#9d174d}
        .badge-recruit{background:#ede9fe;color:#4c1d95}.badge-exam{background:#ffedd5;color:#9a3412}
        .badge-general{background:#f1f5f9;color:#334155}
        footer.site-footer{background:var(--ink);color:#aaa;text-align:center;padding:2rem 1.5rem;margin-top:4rem;font-size:.85rem}
        footer.site-footer a{color:var(--accent);text-decoration:none}
        @media(max-width:700px){
            .hamburger{display:block}
            nav.main-nav{display:none;position:absolute;top:100%;left:0;right:0;background:var(--paper);border-top:2px solid var(--border);padding:1rem 1.5rem;flex-direction:column}
            nav.main-nav.open{display:flex}
            nav.main-nav a{margin:.4rem 0;font-size:1rem}
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="topbar">📢 Latest government exam news — Admit Cards · Results · Recruitment</div>
<header class="site-header">
    <div class="header-inner">
        <a href="{{ route('blog.index') }}" class="site-logo">Blog<span>Hub</span></a>
        <button class="hamburger" id="navToggle">☰</button>
        <nav class="main-nav" id="mainNav">
            <a href="{{ route('blog.index') }}">Home</a>
            <a href="{{ route('blog.index') }}?category=Admit+Card">Admit Cards</a>
            <a href="{{ route('blog.index') }}?category=Result">Results</a>
            <a href="{{ route('blog.index') }}?category=Recruitment">Jobs</a>
            <a href="{{ route('admin.login') }}" style="color:var(--accent)">Admin ↗</a>
        </nav>
    </div>
</header>
<main>@yield('content')</main>
<footer class="site-footer">
    <p>© {{ date('Y') }} <strong style="color:#fff">BlogHub</strong> — Government Exam News Portal &nbsp;|&nbsp; <a href="{{ route('admin.login') }}">Admin Login</a></p>
</footer>
<script>$('#navToggle').on('click',function(){$('#mainNav').toggleClass('open')});</script>
@stack('scripts')
</body>
</html>
