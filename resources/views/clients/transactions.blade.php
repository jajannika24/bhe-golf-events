<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Company Transactions | BHE Golf Events</title>
<style>
:root{--bg:#f5f6f8;--white:#fff;--ink:#202633;--muted:#7c8593;--line:#e8ebef;--purple:#6554a4;--purple-light:#f3f0fb;--gray-icon:#929aa6}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font:14px Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}a{text-decoration:none;color:inherit}button{font:inherit}.app{min-height:100vh;display:grid;grid-template-columns:252px minmax(0,1fr)}
.sidebar{background:#fff;border-right:1px solid var(--line);padding:27px 17px;display:flex;flex-direction:column;gap:34px}.logo{display:flex;align-items:center;gap:12px;padding:0 10px}.logo-mark{height:43px;width:43px;border:1px solid #e5e7eb;border-radius:12px;background:#f3f4f6;display:grid;place-items:center;color:#8d96a2}.logo-mark svg{width:23px;height:23px}.logo strong{font-size:15px;letter-spacing:-.3px}.logo small{display:block;color:var(--muted);font-size:11px;margin-top:4px}.nav-label{padding:0 13px;margin-bottom:11px;color:#a1a8b2;font-size:10px;font-weight:750;letter-spacing:1.5px}.nav-list{display:grid;gap:5px}.nav-item{display:flex;align-items:center;gap:12px;padding:13px 14px;border-radius:10px;color:#626d7a;font-weight:550;font-size:13px}.nav-item svg{width:19px;height:19px;color:#9ba3ae;flex-shrink:0}.nav-item.active{background:#f2eff9;color:#59488e}.nav-item.active svg{color:#7766a9}.nav-item:not(.active):hover{background:#f7f8fa}.sidebar-bottom{margin-top:auto;padding:16px;border:1px solid var(--line);background:#fafbfc;border-radius:12px;color:#87909c;font-size:11px;line-height:1.6}
.main{min-width:0}.topbar{height:78px;background:#fff;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center;padding:0 38px;gap:18px}.breadcrumb{color:#8b94a0;font-size:12px}.breadcrumb b{color:#3c4654;font-weight:650}.user{display:flex;align-items:center;gap:13px}.avatar{height:35px;width:35px;display:grid;place-items:center;background:#eef0f3;border:1px solid #e1e4e9;color:#68727f;border-radius:50%;font-weight:750}.user-details{line-height:1.4}.user-details strong{display:block;font-size:12px}.user-details small{color:var(--muted);font-size:11px}.logout{background:#fff;border:1px solid var(--line);border-radius:9px;padding:9px 12px;color:#626b79;font-size:12px;margin-left:6px;cursor:pointer}
.content{max-width:1370px;margin:auto;padding:38px}.back{display:inline-flex;align-items:center;gap:8px;color:#737d8a;font-size:12px;font-weight:650;margin-bottom:23px}.back:hover{color:var(--purple)}.back svg{width:16px;height:16px}.heading{display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;margin-bottom:28px}.eyebrow{color:#8b7ab3;text-transform:uppercase;font-weight:750;letter-spacing:1.7px;font-size:10px}h1{font-size:30px;letter-spacing:-1px;margin:9px 0 8px;font-weight:760}.lead{color:var(--muted);margin:0;line-height:1.7;font-size:13px}.primary{display:inline-flex;align-items:center;justify-content:center;gap:9px;border-radius:10px;padding:12px 17px;background:var(--purple);color:#fff;font-weight:650;font-size:12px;box-shadow:0 5px 12px #6554a41c}.primary:hover{background:#52428c}.primary svg{width:17px;height:17px}.section-title{display:flex;align-items:center;justify-content:space-between;margin:27px 0 15px}.section-title h2{margin:0;font-size:15px}.section-title span{font-size:11px;color:#98a0ab}
.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}.box{background:#fff;border:1px solid var(--line);border-radius:15px;padding:23px;display:flex;flex-direction:column;min-height:235px;transition:transform .2s,border-color .2s,box-shadow .2s}.box:hover{transform:translateY(-2px);border-color:#c9c0df;box-shadow:0 12px 25px #26304408}.card-icon{width:49px;height:49px;border-radius:12px;background:#f2f3f5;border:1px solid #e8eaee;display:grid;place-items:center;color:var(--gray-icon)}.card-icon svg{width:24px;height:24px}.box h3{font-size:15px;margin:17px 0 11px;line-height:1.4}.meta{font-size:12px;color:var(--muted);margin:0 0 7px}.meta strong{color:#525c69;font-weight:600}.card-next{margin-top:auto;padding-top:16px;border-top:1px solid #f0f1f3;color:var(--purple);font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:space-between}.card-next svg{width:16px;height:16px}.empty{background:#fff;border:1px dashed #d8dce3;border-radius:12px;padding:28px;color:var(--muted);font-size:13px;grid-column:1/-1}.footer{text-align:center;color:#a1a8b2;font-size:11px;padding:25px 20px 40px}
@media(max-width:1100px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.content{padding:28px}.topbar{padding:0 28px}}@media(max-width:800px){.app{display:block}.sidebar{padding:16px;gap:15px;border-right:0;border-bottom:1px solid var(--line)}.nav-label,.sidebar-bottom{display:none}.nav-list{display:flex;overflow-x:auto}.nav-item{white-space:nowrap;padding:10px 12px}.topbar{height:65px;padding:0 18px}.content{padding:23px 18px}}@media(max-width:580px){.grid{grid-template-columns:1fr}.heading h1{font-size:25px}.primary{width:100%}.user-details{display:none}}
</style>
</head>
<body>
@php
$svg = [
 'golf'=>'<path d="M5 21V4"/><path d="M5 4c5-3 8 3 14 0v10c-6 3-9-3-14 0"/>',
 'grid'=>'<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>',
 'briefcase'=>'<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/>',
 'file'=>'<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/>',
 'list'=>'<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/>',
 'plus'=>'<path d="M12 5v14M5 12h14"/>',
 'arrow'=>'<path d="M5 12h14m-6-6 6 6-6 6"/>',
 'back'=>'<path d="m12 19-7-7 7-7M5 12h14"/>'
];
@endphp
<div class="app">
<aside class="sidebar">
 <div class="logo"><div class="logo-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['golf'] !!}</svg></div><div><strong>BHE Golf Events</strong><small>Management Workspace</small></div></div>
 <nav aria-label="Main navigation"><div class="nav-label">WORKSPACE</div><div class="nav-list">
  <a href="/clients" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['grid'] !!}</svg>Dashboard</a>
  <a href="/transactions" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['list'] !!}</svg>Transactions</a>
  <a href="/clients#companies" class="nav-item active" aria-current="page"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['briefcase'] !!}</svg>Companies</a>
  <a href="{{ route('bir.index') }}" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['file'] !!}</svg>BIR Documents</a>
 </div></nav><div class="sidebar-bottom">A centralized workspace for company records, golf event transactions, and supporting documents.</div>
</aside>
<div class="main">
 <header class="topbar"><div class="breadcrumb">Workspace &nbsp;/&nbsp; Companies &nbsp;/&nbsp; <b>Transactions</b></div><div class="user"><div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div><div class="user-details"><strong>{{ auth()->user()->name }}</strong><small>{{ ucfirst(auth()->user()->role ?? 'staff') }} account</small></div><form action="{{ route('logout') }}" method="POST" style="margin:0">@csrf<button class="logout" type="submit">Log out</button></form></div></header>
 <main class="content">
  <a href="/clients" class="back"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $svg['back'] !!}</svg>Back to Dashboard</a>
  <div class="heading"><div><div class="eyebrow">Company records</div><h1>{{ $client->client_name }}</h1><p class="lead">Golf events, shirt orders, and other client transactions.</p></div><a href="/transactions/create" class="primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">{!! $svg['plus'] !!}</svg>Add Transaction</a></div>
  <div class="section-title"><h2>Company Transactions</h2><span>{{ $transactions->count() }} {{ $transactions->count() === 1 ? 'transaction' : 'transactions' }}</span></div>
  <section class="grid" aria-label="Company transactions">
  @forelse ($transactions as $transaction)
   <a class="box" href="/transactions/{{ $transaction->id }}/documents" aria-label="View documents for {{ $transaction->transaction_name }}">
    <div class="card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $svg['file'] !!}</svg></div>
    <h3>{{ $transaction->transaction_name }}</h3>
    <p class="meta"><strong>Date:</strong> {{ $transaction->transaction_date }}</p>
    <p class="meta"><strong>PO:</strong> {{ $transaction->po_number ?: 'Not provided' }}</p>
    <div class="card-next"><span>Next: View Documents</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $svg['arrow'] !!}</svg></div>
   </a>
  @empty
   <div class="empty">No transactions yet for this company. Select Add Transaction to create one.</div>
  @endforelse
  </section>
 </main>
 <footer class="footer">BHE Golf Events &middot; Transaction &amp; Document Management System</footer>
</div></div>
</body>
</html>
