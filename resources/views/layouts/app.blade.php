<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventaris') · Inventory Management</title>
    <style>
        :root{--navy:#14213d;--blue:#2563eb;--bg:#f4f7fb;--ink:#172033;--muted:#718096;--line:#e5eaf2}
        *{box-sizing:border-box}body{margin:0;font-family:Inter,Segoe UI,Arial,sans-serif;background:var(--bg);color:var(--ink)}
        .sidebar{position:fixed;inset:0 auto 0 0;width:245px;background:var(--navy);color:#fff;padding:26px 16px;display:flex;flex-direction:column}
        .brand{font-size:19px;font-weight:800;padding:0 12px 28px}.brand small{display:block;color:#a9b8d4;font-size:11px;font-weight:500;margin-top:5px}
        .nav-label{font-size:10px;letter-spacing:1.5px;color:#93a4c3;padding:12px}
        .nav a{display:block;color:#dce6f7;text-decoration:none;padding:12px;border-radius:10px;margin:4px 0;font-size:14px}
        .nav a:hover,.nav a.active{background:#263858;color:white}.side-bottom{margin-top:auto;padding:12px;color:#a9b8d4;font-size:12px}
        .main{margin-left:245px;min-height:100vh}.topbar{height:74px;background:white;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 34px}
        .topbar strong{font-size:14px}.user-chip{background:#eef4ff;color:#244b9b;border-radius:30px;padding:9px 13px;font-size:12px}
        .content{padding:30px 34px;max-width:1500px;margin:auto}.page-head{display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:24px}
        h1{font-size:27px;margin:0 0 7px;letter-spacing:-.6px}.muted{color:var(--muted);font-size:13px}.grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px}
        .card{background:white;border:1px solid var(--line);border-radius:16px;padding:20px;box-shadow:0 5px 20px #20304a08}
        .stat-label{color:var(--muted);font-size:12px}.stat-value{font-size:28px;font-weight:800;margin-top:10px}.panel{background:#fff;border:1px solid var(--line);border-radius:16px;padding:22px;margin-top:22px;overflow:hidden}
        .btn{display:inline-flex;align-items:center;justify-content:center;border:0;border-radius:10px;padding:11px 15px;background:var(--blue);color:white;text-decoration:none;font-weight:700;font-size:13px;cursor:pointer}
        .btn.secondary{background:#edf2f8;color:#27364e}.btn.danger{background:#fee2e2;color:#991b1b}.btn.small{padding:7px 10px;font-size:12px}
        table{width:100%;border-collapse:collapse;font-size:13px}th{text-align:left;color:#748198;background:#f8fafc;font-size:11px;text-transform:uppercase;letter-spacing:.5px}
        th,td{padding:14px 12px;border-bottom:1px solid var(--line);vertical-align:middle}tr:last-child td{border-bottom:0}
        .badge{display:inline-block;padding:5px 9px;border-radius:30px;background:#eaf2ff;color:#1d4ed8;font-size:11px;font-weight:700}
        .field{margin-bottom:17px}.field label{display:block;font-size:12px;font-weight:700;margin-bottom:7px}.field input,.field select{width:100%;padding:12px 13px;border:1px solid #dbe2ed;border-radius:10px;font:inherit;font-size:13px;background:white}
        .field input:focus,.field select:focus{outline:3px solid #dbeafe;border-color:#60a5fa}.error{color:#b91c1c;font-size:12px;margin-top:5px}
        .flash{padding:13px 15px;border-radius:10px;margin-bottom:18px;font-size:13px}.success{background:#dcfce7;color:#166534}.failure{background:#fee2e2;color:#991b1b}
        .actions{display:flex;gap:7px;align-items:center;flex-wrap:wrap}.search{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}.search input,.search select{padding:10px;border:1px solid var(--line);border-radius:9px;background:white}
        .auth-page{min-height:100vh;display:grid;grid-template-columns:1fr 1fr;background:white}.auth-art{background:linear-gradient(145deg,#101b35,#1d4ed8);color:white;padding:9%;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden}
        .auth-art:after{content:"";position:absolute;width:400px;height:400px;border:1px solid #ffffff25;border-radius:50%;right:-160px;bottom:-160px;box-shadow:0 0 0 50px #ffffff08,0 0 0 100px #ffffff05}
        .auth-art h1{font-size:42px;line-height:1.12;max-width:480px}.auth-art p{color:#d4e0ff;line-height:1.7;max-width:420px}
        .auth-form-wrap{display:flex;align-items:center;justify-content:center;padding:35px}.auth-form{width:100%;max-width:400px}.auth-form h2{font-size:28px;margin:0 0 8px}.auth-form .muted{margin-bottom:28px;display:block}
        .full{width:100%}.form-foot{text-align:center;margin-top:22px;font-size:13px;color:var(--muted)}.form-foot a{color:var(--blue);font-weight:700;text-decoration:none}
        @media(max-width:1000px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.sidebar{width:205px}.main{margin-left:205px}.content{padding:22px}}
        @media(max-width:700px){.sidebar{position:static;width:auto;min-height:auto}.side-bottom{display:none}.main{margin-left:0}.nav{display:flex;gap:5px;flex-wrap:wrap}.nav-label{display:none}.topbar{padding:0 18px}.content{padding:20px 14px}.grid{grid-template-columns:1fr 1fr}.auth-page{grid-template-columns:1fr}.auth-art{display:none}.auth-form-wrap{min-height:100vh;padding:24px}.page-head{align-items:flex-start;flex-direction:column}table{min-width:650px}.panel.table-panel{overflow-x:auto}}
    </style>
</head>
<body>
@if(request()->routeIs('login','register'))
    @yield('content')
@else
    <aside class="sidebar">
        <div class="brand">◈ Inventory<span style="color:#7da8ff">.</span><small>MANAGEMENT SYSTEM</small></div>
        <div class="nav-label">MENU UTAMA</div>
        <nav class="nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">▦ &nbsp; Dashboard</a>
            <a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}">▤ &nbsp; Data Barang</a>
            <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">▧ &nbsp; Kategori</a>
        </nav>
        <div class="side-bottom">Inventory Management<br>Laravel · MySQL</div>
    </aside>
    <main class="main">
        <header class="topbar"><strong>@yield('top-title', 'Workspace')</strong>
            <div class="actions"><span class="user-chip">{{ auth()->user()->name ?? 'Pengguna' }}</span>
                <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn secondary small" type="submit">Logout</button></form>
            </div>
        </header>
        <section class="content">
            @if(session('success'))<div class="flash success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="flash failure">{{ session('error') }}</div>@endif
            @yield('content')
        </section>
    </main>
@endif
</body>
</html>
