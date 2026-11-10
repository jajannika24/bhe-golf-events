<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BHE Golf Events | Workspace</title>
<style>
:root{--bg:#f5f6f8;--white:#fff;--ink:#202633;--muted:#7c8593;--line:#e8ebef;--purple:#6554a4;--purple-light:#f3f0fb;--gray-icon:#929aa6}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;font-size:14px}a{color:inherit;text-decoration:none}button,input{font:inherit}button{cursor:pointer}.app{min-height:100vh;display:grid;grid-template-columns:252px minmax(0,1fr)}
.sidebar{background:#fff;border-right:1px solid var(--line);padding:27px 17px;display:flex;flex-direction:column;gap:34px}.logo{display:flex;align-items:center;gap:12px;padding:0 10px}.logo-mark{height:43px;width:43px;border:1px solid #e5e7eb;border-radius:12px;background:#f3f4f6;display:grid;place-items:center;color:#8d96a2}.logo-mark svg{width:23px;height:23px}.logo strong{font-size:15px;letter-spacing:-.3px}.logo small{display:block;color:var(--muted);font-size:11px;margin-top:4px}.nav-label{padding:0 13px;margin-bottom:11px;color:#a1a8b2;font-size:10px;font-weight:750;letter-spacing:1.5px}.nav-list{display:grid;gap:5px}.nav-item{display:flex;align-items:center;gap:12px;padding:13px 14px;border-radius:10px;color:#626d7a;font-weight:550;font-size:13px}.nav-item svg{width:19px;height:19px;color:#9ba3ae;flex-shrink:0}.nav-item.active{background:#f2eff9;color:#59488e}.nav-item.active svg{color:#7766a9}.nav-item:not(.active):hover{background:#f7f8fa}.nav-item.disabled{opacity:.65;cursor:default}.nav-item .soon{margin-left:auto;font-size:10px;color:#8e84a9}.sidebar-bottom{margin-top:auto;padding:16px;border:1px solid var(--line);background:#fafbfc;border-radius:12px;color:#87909c;font-size:11px;line-height:1.6}
.main{min-width:0}.topbar{height:78px;background:#fff;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center;padding:0 38px;gap:18px}.breadcrumb{color:#8b94a0;font-size:12px}.breadcrumb b{color:#3c4654;font-weight:650}.user{display:flex;align-items:center;gap:13px}.avatar{height:35px;width:35px;display:grid;place-items:center;background:#eef0f3;border:1px solid #e1e4e9;color:#68727f;border-radius:50%;font-weight:750}.user-details{line-height:1.4}.user-details strong{display:block;font-size:12px}.user-details small{color:var(--muted);font-size:11px}.logout{background:#fff;border:1px solid var(--line);border-radius:9px;padding:9px 12px;color:#626b79;font-size:12px;margin-left:6px}.logout:hover{background:#f7f8fa}
.content{max-width:1370px;margin:auto;padding:38px}.eyebrow{color:#8b7ab3;text-transform:uppercase;font-weight:750;letter-spacing:1.7px;font-size:10px}.heading{display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;margin-bottom:27px}h1{font-size:30px;letter-spacing:-1px;margin:9px 0 8px;font-weight:760}.lead{color:var(--muted);margin:0;line-height:1.7;font-size:13px}.primary{display:inline-flex;align-items:center;justify-content:center;gap:9px;border-radius:10px;padding:12px 17px;background:var(--purple);color:#fff;font-weight:650;font-size:12px;box-shadow:0 5px 12px #6554a41c}.primary:hover{background:#52428c}.primary svg{width:17px;height:17px}
.hero{background:#fff;border:1px solid var(--line);border-radius:17px;padding:27px 30px;display:flex;align-items:center;justify-content:space-between;gap:25px;overflow:hidden;position:relative}.hero:before{content:"";position:absolute;width:270px;height:270px;border:1px solid #e9e7f0;border-radius:50%;right:-95px;top:-155px}.hero:after{content:"";position:absolute;width:170px;height:170px;border:1px solid #eceaf3;border-radius:50%;right:30px;bottom:-125px}.hero-copy{position:relative;z-index:1;max-width:610px}.hero h2{font-size:19px;letter-spacing:-.4px;margin:0 0 10px}.hero p{margin:0;color:#7b8592;font-size:12px;line-height:1.8}.hero-art{position:relative;z-index:1;color:#aeb4be;border:1px solid #edf0f3;background:#f7f8fa;border-radius:17px;padding:17px;transform:rotate(-6deg)}.hero-art svg{width:48px;height:48px}
.section-title{display:flex;align-items:center;justify-content:space-between;margin:31px 0 15px}.section-title h3{margin:0;font-size:15px;letter-spacing:-.25px}.section-title span{font-size:11px;color:#98a0ab}.modules{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.module{background:#fff;border:1px solid var(--line);border-radius:15px;padding:23px;display:flex;gap:17px;min-height:156px;transition:transform .2s,border-color .2s,box-shadow .2s}.module.link:hover,.company:hover{transform:translateY(-2px);border-color:#c9c0df;box-shadow:0 12px 25px #26304408}.module-icon,.company-icon{width:49px;height:49px;border-radius:12px;background:#f2f3f5;border:1px solid #e8eaee;display:grid;place-items:center;flex-shrink:0;color:var(--gray-icon)}.module-icon svg,.company-icon svg{width:24px;height:24px}.module h4{margin:3px 0 8px;font-size:14px}.module p{color:var(--muted);font-size:12px;line-height:1.65;margin:0}.module-bottom{margin-top:17px;color:var(--purple);font-size:11px;font-weight:700}.tag{display:inline-block;background:#f1eff7;border-radius:7px;color:#82729f;padding:5px 8px;font-size:10px;margin-top:15px;font-weight:700}
.panel{background:#fff;border:1px solid var(--line);border-radius:15px;padding:21px}.search-head{display:flex;align-items:center;justify-content:space-between;gap:15px;margin-bottom:13px}.search-head label{font-size:12px;font-weight:700;color:#48515e}.search-head span{font-size:11px;color:#939ca7}.search-wrap{position:relative}.search-wrap svg{position:absolute;left:15px;top:50%;transform:translateY(-50%);height:19px;width:19px;color:#a0a8b3;pointer-events:none}.search-input{width:100%;border:1px solid #e2e5ea;background:#fbfcfd;border-radius:10px;padding:14px 15px 14px 44px;outline:none;font-size:12px;color:#35404e}.search-input:focus{background:#fff;border-color:#a99bce;box-shadow:0 0 0 3px #6554a414}.search-info{color:#98a0ab;font-size:11px;margin-top:12px}
.companies{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}.company{background:#fff;border:1px solid var(--line);border-radius:14px;padding:21px;min-width:0;transition:transform .2s,border-color .2s,box-shadow .2s}.company[hidden]{display:none}.company-icon{height:45px;width:45px}.company-icon svg{height:21px;width:21px}.company-name{font-size:14px;font-weight:700;margin-top:18px;overflow-wrap:anywhere}.company-contact{font-size:12px;color:var(--muted);margin-top:7px;min-height:18px}.company-action{border-top:1px solid #f0f1f3;padding-top:15px;margin-top:18px;color:#6554a4;font-weight:650;font-size:11px;display:flex;justify-content:space-between;align-items:center}.empty{border:1px dashed #d8dce3;background:#fff;border-radius:12px;padding:27px;color:var(--muted);font-size:12px}.footer{text-align:center;color:#a1a8b2;font-size:11px;padding:25px 20px 40px}
@media(max-width:1100px){.companies{grid-template-columns:repeat(2,minmax(0,1fr))}.content{padding:28px}.topbar{padding:0 28px}}@media(max-width:800px){.app{display:block}.sidebar{padding:16px;gap:15px;border-right:0;border-bottom:1px solid var(--line)}.nav-label,.sidebar-bottom{display:none}.nav-list{display:flex;overflow-x:auto}.nav-item{white-space:nowrap;padding:10px 12px}.topbar{height:65px;padding:0 18px}.content{padding:23px 18px}.hero-art{display:none}.modules{grid-template-columns:1fr}.companies{grid-template-columns:1fr 1fr}}@media(max-width:520px){.companies{grid-template-columns:1fr}.heading h1{font-size:25px}.primary{width:100%}.user-details{display:none}.topbar{gap:8px}.hero{padding:23px}.module{min-height:auto}}
</style>
</head>
<body>
@php
    $svg = [
        'golf' => '<path d="M5 21V4"/><path d="M5 4c5-3 8 3 14 0v10c-6 3-9-3-14 0"/>',
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>',
        'briefcase' => '<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/>',
        'file' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/>',
        'list' => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/>',
        'search' => '<circle cx="11" cy="11" r="7"/><path d="m16 16 5 5"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'arrow' => '<path d="M5 12h14m-6-6 6 6-6 6"/>',
        'layers' => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/>',
    ];
@endphp
<div class="app">
<aside class="sidebar">
    <div class="logo">
        <div class="logo-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['golf'] !!}</svg></div>
        <div><strong>BHE Golf Events</strong><small>Management Workspace</small></div>
    </div>
    <nav aria-label="Main navigation">
        <div class="nav-label">WORKSPACE</div>
        <div class="nav-list">
            <a href="/clients" class="nav-item active" aria-current="page"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['grid'] !!}</svg>Dashboard</a>
            <a href="/transactions" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['list'] !!}</svg>Transactions</a>
            <a href="#companies" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['briefcase'] !!}</svg>Companies</a>
            <a href="{{ route('bir.index') }}" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['file'] !!}</svg>BIR Documents</a>
        </div>
    </nav>
    <div class="sidebar-bottom">A centralized workspace for company records, golf event transactions, and supporting documents.</div>
</aside>
<div class="main">
<header class="topbar">
    <div class="breadcrumb">Workspace &nbsp;/&nbsp; <b>Dashboard</b></div>
    <div class="user">
        <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div>
        <div class="user-details"><strong>{{ auth()->user()->name }}</strong><small>{{ ucfirst(auth()->user()->role ?? 'staff') }} account</small></div>
        <form action="{{ route('logout') }}" method="POST" style="margin:0">@csrf<button class="logout" type="submit">Log out</button></form>
    </div>
</header>
<main class="content">
    <div class="heading">
        <div><div class="eyebrow">Your workspace</div><h1>Company Dashboard</h1><p class="lead">Everything you need to manage your events and records, in one place.</p></div>
        <a href="/clients/create" class="primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">{!! $svg['plus'] !!}</svg>Add New Company</a>
    </div>
    <section class="hero" aria-label="Welcome">
        <div class="hero-copy"><h2>Welcome to your management workspace</h2><p>Access event transactions, find company records, and keep financial documents organized. Use the BIR Invoice & Receipts workspace to upload, organize, preview, download, and compile invoices independently of companies and transactions.</p></div>
        <div class="hero-art" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">{!! $svg['layers'] !!}</svg></div>
    </section>
    <div class="section-title"><h3>Quick access</h3><span>Core modules</span></div>
    <section class="modules" aria-label="Quick access">
        <a href="/transactions" class="module link">
            <div class="module-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['list'] !!}</svg></div>
            <div><h4>Transactions</h4><p>View and manage golf event transactions, payment statuses, and associated records.</p><div class="module-bottom">Open transactions &rarr;</div></div>
        </a>
        <a href="{{ route('bir.index') }}" class="module link">
            <div class="module-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['file'] !!}</svg></div>
            <div><h4>BIR Invoice &amp; Receipts</h4><p>A separate space to upload invoices and receipts without linking a company or transaction.</p><div class="module-bottom">Open BIR documents &rarr;</div></div>
        </a>
    </section>
    <div class="section-title"><h3>Find a company</h3><span>Search company records</span></div>
    <section class="panel" aria-label="Company search">
        <div class="search-head"><label for="clientSearch">Search companies</label><span>Name or contact person</span></div>
        <div class="search-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">{!! $svg['search'] !!}</svg><input id="clientSearch" class="search-input" type="search" placeholder="Start typing to find a company..." autocomplete="off"></div>
        <div id="searchInfo" class="search-info" aria-live="polite">Showing all companies.</div>
    </section>
    <div class="section-title" id="companies"><h3>Your companies</h3><span>Choose a company to view its transactions</span></div>
    <section class="companies" id="companyGrid" aria-label="Company records">
        @forelse ($clients as $client)
            <a href="/clients/{{ $client->id }}/transactions" class="company" data-search="{{ strtolower($client->client_name . ' ' . ($client->contact_person ?? '')) }}">
                <div class="company-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['briefcase'] !!}</svg></div>
                <div class="company-name">{{ $client->client_name }}</div>
                <div class="company-contact">{{ $client->contact_person ?: 'Company Record' }}</div>
                <div class="company-action">View transactions <span aria-hidden="true">&rarr;</span></div>
            </a>
        @empty
            <div class="empty">No companies yet. Add your first company to get started.</div>
        @endforelse
    </section>
    <div id="noResults" class="empty" style="display:none;margin-top:16px">No matching companies found. Try a different search.</div>
</main>
<footer class="footer">BHE Golf Events &middot; Transaction &amp; Document Management System</footer>
</div>
</div>
<script>
const searchInput=document.getElementById('clientSearch');
const companyCards=document.querySelectorAll('.company');
const noResults=document.getElementById('noResults');
const searchInfo=document.getElementById('searchInfo');
function filterCompanies(){
 const query=searchInput.value.trim().toLowerCase();let visible=0;
 companyCards.forEach(card=>{const matches=(card.dataset.search||'').includes(query);card.hidden=!matches;if(matches)visible++;});
 noResults.style.display=companyCards.length>0&&visible===0?'block':'none';
 searchInfo.textContent=query===''?'Showing all '+companyCards.length+' companies.':'Found '+visible+' matching compan'+(visible===1?'y.':'ies.');
}
searchInput.addEventListener('input',filterCompanies);filterCompanies();
</script>
</body>
</html>
