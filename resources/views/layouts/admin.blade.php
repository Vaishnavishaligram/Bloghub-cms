<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Admin') — BlogHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        :root{--bg:#0d1117;--surface:#161b22;--border:#30363d;--accent:#c8392b;--green:#238636;--text:#e6edf3;--muted:#8b949e;--yellow:#d29922;--radius:8px;--font:'DM Sans',sans-serif}
        body{font-family:var(--font);background:var(--bg);color:var(--text);display:flex;min-height:100vh}
        .admin-sidebar{width:230px;background:var(--surface);border-right:1px solid var(--border);padding:1.5rem 0;flex-shrink:0;display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto}
        .sidebar-brand{font-family:'Playfair Display',serif;font-size:1.4rem;font-weight:900;color:var(--text);padding:0 1.4rem 1.5rem;border-bottom:1px solid var(--border)}
        .sidebar-brand span{color:var(--accent)}
        .sidebar-brand small{display:block;font-family:var(--font);font-size:.7rem;color:var(--muted);font-weight:400;margin-top:.1rem}
        .sidebar-nav{padding:1rem 0;flex:1}
        .sidebar-nav a{display:flex;align-items:center;gap:.6rem;padding:.6rem 1.4rem;color:var(--muted);text-decoration:none;font-size:.9rem;font-weight:500;transition:all .15s;border-left:3px solid transparent}
        .sidebar-nav a:hover,.sidebar-nav a.active{color:var(--text);background:rgba(255,255,255,.04);border-left-color:var(--accent)}
        .nav-section{font-size:.68rem;font-weight:700;letter-spacing:.8px;text-transform:uppercase;color:var(--muted);padding:1rem 1.4rem .35rem}
        .sidebar-footer{border-top:1px solid var(--border);padding:1rem 1.4rem;font-size:.8rem;color:var(--muted)}
        .sidebar-footer a{color:var(--accent);text-decoration:none;font-size:.82rem}
        .admin-main{flex:1;display:flex;flex-direction:column;min-width:0}
        .admin-topbar{background:var(--surface);border-bottom:1px solid var(--border);padding:.85rem 1.8rem;display:flex;align-items:center;justify-content:space-between}
        .admin-topbar h1{font-family:'Playfair Display',serif;font-size:1.15rem;font-weight:700}
        .topbar-actions{display:flex;gap:.6rem}
        .admin-content{padding:2rem 1.8rem;flex:1}
        .alert{padding:.75rem 1rem;border-radius:var(--radius);margin-bottom:1.2rem;font-size:.9rem;font-weight:500}
        .alert-success{background:rgba(35,134,54,.15);border:1px solid rgba(35,134,54,.4);color:#3fb950}
        .alert-error{background:rgba(200,57,43,.15);border:1px solid rgba(200,57,43,.4);color:#f85149}
        .btn{display:inline-block;padding:.42rem 1rem;border-radius:6px;font-family:var(--font);font-size:.88rem;font-weight:600;cursor:pointer;border:1px solid transparent;text-decoration:none;transition:all .15s}
        .btn-sm{padding:.28rem .65rem;font-size:.78rem}
        .btn-primary{background:var(--accent);color:#fff;border-color:var(--accent)}.btn-primary:hover{background:#a32418}
        .btn-success{background:var(--green);color:#fff;border-color:var(--green)}.btn-success:hover{background:#1b6f2d}
        .btn-warning{background:var(--yellow);color:#000;border-color:var(--yellow)}
        .btn-danger{background:#da3633;color:#fff;border-color:#da3633}.btn-danger:hover{background:#b02222}
        .btn-outline{background:transparent;border-color:var(--border);color:var(--text)}.btn-outline:hover{border-color:var(--text)}
        .card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden}
        .card-header{padding:.9rem 1.2rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}
        .card-header h3{font-size:1rem;font-weight:600}
        .card-body{padding:1.2rem}
        .table-wrap{overflow-x:auto}
        table.admin-table{width:100%;border-collapse:collapse;font-size:.875rem}
        table.admin-table th{text-align:left;padding:.65rem .9rem;border-bottom:1px solid var(--border);color:var(--muted);font-size:.75rem;font-weight:700;letter-spacing:.5px;text-transform:uppercase}
        table.admin-table td{padding:.8rem .9rem;border-bottom:1px solid rgba(48,54,61,.5);vertical-align:middle}
        table.admin-table tr:hover td{background:rgba(255,255,255,.02)}
        table.admin-table tr:last-child td{border-bottom:none}
        .form-group{margin-bottom:1.2rem}
        .form-label{display:block;font-size:.85rem;font-weight:600;margin-bottom:.4rem;color:var(--muted)}
        .form-control{width:100%;padding:.55rem .85rem;background:var(--bg);border:1px solid var(--border);border-radius:6px;color:var(--text);font-family:var(--font);font-size:.9rem;outline:none;transition:border-color .15s}
        .form-control:focus{border-color:#58a6ff}
        textarea.form-control{resize:vertical;min-height:180px}
        select.form-control{cursor:pointer}
        .form-error{color:#f85149;font-size:.8rem;margin-top:.3rem}
        .stats-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:1rem;margin-bottom:2rem}
        .stat-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:1.2rem}
        .stat-card .stat-num{font-family:'Playfair Display',serif;font-size:2.2rem;font-weight:900;line-height:1}
        .stat-card .stat-label{font-size:.8rem;color:var(--muted);margin-top:.3rem}
        .stat-card.green .stat-num{color:#3fb950}.stat-card.red .stat-num{color:var(--accent)}.stat-card.blue .stat-num{color:#58a6ff}
        @media(max-width:768px){.admin-sidebar{display:none}}
    </style>
    @stack('styles')
</head>
<body>
<aside class="admin-sidebar">
    <div class="sidebar-brand">Blog<span>Hub</span><small>Admin Panel</small></div>
    <nav class="sidebar-nav">
        <div class="nav-section">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard')?'active':'' }}">🏠 Dashboard</a>
        <div class="nav-section">Content</div>
        <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.index')?'active':'' }}">📝 All Blogs</a>
        <a href="{{ route('admin.blogs.create') }}" class="{{ request()->routeIs('admin.blogs.create')?'active':'' }}">➕ New Blog</a>
        <div class="nav-section">Site</div>
        <a href="{{ route('blog.index') }}" target="_blank">🌐 View Site ↗</a>
    </nav>
    <div class="sidebar-footer">
        <div>Signed in as<br><strong style="color:var(--text)">{{ session('admin_email') }}</strong></div>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin-top:.6rem">
            @csrf
            <button type="submit" style="background:none;border:none;cursor:pointer;color:var(--accent);font-family:var(--font);font-size:.82rem;padding:0">Sign out →</button>
        </form>
    </div>
</aside>
<div class="admin-main">
    <div class="admin-topbar">
        <h1>@yield('page-title','Dashboard')</h1>
        <div class="topbar-actions">@yield('topbar-actions')</div>
    </div>
    <div class="admin-content">
        @if(session('success'))<div class="alert alert-success">✅ {{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-error">❌ {{ session('error') }}</div>@endif
        @yield('content')
    </div>
</div>
@stack('scripts')
</body>
</html>
