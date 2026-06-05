<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — BlogHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'DM Sans',sans-serif;background:#0d1117;color:#e6edf3;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:1.5rem}
        .login-card{width:100%;max-width:400px;background:#161b22;border:1px solid #30363d;border-radius:12px;padding:2.5rem}
        .login-brand{text-align:center;margin-bottom:2rem}
        .login-brand h1{font-family:'Playfair Display',serif;font-size:2rem;font-weight:900}
        .login-brand h1 span{color:#c8392b}
        .login-brand p{font-size:.85rem;color:#8b949e;margin-top:.3rem}
        .form-group{margin-bottom:1.1rem}
        .form-label{display:block;font-size:.82rem;font-weight:600;color:#8b949e;margin-bottom:.4rem}
        .form-control{width:100%;padding:.6rem .9rem;background:#0d1117;border:1px solid #30363d;border-radius:6px;color:#e6edf3;font-family:'DM Sans',sans-serif;font-size:.9rem;outline:none;transition:border-color .15s}
        .form-control:focus{border-color:#58a6ff}
        .btn-login{width:100%;padding:.65rem;background:#c8392b;color:#fff;border:none;border-radius:6px;font-family:'DM Sans',sans-serif;font-size:.95rem;font-weight:700;cursor:pointer;margin-top:.5rem;transition:background .15s}
        .btn-login:hover{background:#a32418}
        .alert-error{background:rgba(200,57,43,.15);border:1px solid rgba(200,57,43,.4);color:#f85149;padding:.65rem .9rem;border-radius:6px;font-size:.85rem;margin-bottom:1rem}
        .alert-success{background:rgba(35,134,54,.15);border:1px solid rgba(35,134,54,.4);color:#3fb950;padding:.65rem .9rem;border-radius:6px;font-size:.85rem;margin-bottom:1rem}
        .hint-box{margin-top:1.2rem;padding:.75rem;background:rgba(88,166,255,.07);border:1px solid rgba(88,166,255,.2);border-radius:6px;font-size:.78rem;color:#8b949e;text-align:center}
        .hint-box strong{color:#e6edf3}
        .back-link{display:block;text-align:center;margin-top:1.2rem;font-size:.82rem}
        .back-link a{color:#58a6ff;text-decoration:none}
    </style>
</head>
<body>
<div class="login-card">
    <div class="login-brand">
        <h1>Blog<span>Hub</span></h1>
        <p>Admin Panel — Sign In</p>
    </div>
    @if($errors->any())<div class="alert-error">{{ $errors->first() }}</div>@endif
    @if(session('success'))<div class="alert-success">{{ session('success') }}</div>@endif
    @if(session('error'))<div class="alert-error">{{ session('error') }}</div>@endif
    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="admin@blog.com" required autofocus>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn-login">Sign In →</button>
    </form>
    <div class="hint-box">
        Default credentials:<br>
        <strong>admin@blog.com</strong> / <strong>admin123</strong><br>
        <span style="font-size:.72rem">(set ADMIN_EMAIL &amp; ADMIN_PASSWORD in .env)</span>
    </div>
    <p class="back-link"><a href="{{ route('blog.index') }}">← Back to blog</a></p>
</div>
</body>
</html>
