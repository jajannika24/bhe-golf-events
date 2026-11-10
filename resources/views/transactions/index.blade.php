<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>All Transactions | BHE Golf Events</title>
<style>
:root{--bg:#f5f6f8;--white:#fff;--ink:#202633;--muted:#7c8593;--line:#e8ebef;--purple:#6554a4;--purple-light:#f3f0fb;--gray-icon:#929aa6}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;font-size:14px}a{color:inherit;text-decoration:none}button{font:inherit;cursor:pointer}.app{min-height:100vh;display:grid;grid-template-columns:252px minmax(0,1fr)}
.sidebar{background:#fff;border-right:1px solid var(--line);padding:27px 17px;display:flex;flex-direction:column;gap:34px}.logo{display:flex;align-items:center;gap:12px;padding:0 10px}.logo-mark{height:43px;width:43px;border:1px solid #e5e7eb;border-radius:12px;background:#f3f4f6;display:grid;place-items:center;color:#8d96a2}.logo-mark svg{width:23px;height:23px}.logo strong{font-size:15px;letter-spacing:-.3px}.logo small{display:block;color:var(--muted);font-size:11px;margin-top:4px}.nav-label{padding:0 13px;margin-bottom:11px;color:#a1a8b2;font-size:10px;font-weight:750;letter-spacing:1.5px}.nav-list{display:grid;gap:5px}.nav-item{display:flex;align-items:center;gap:12px;padding:13px 14px;border-radius:10px;color:#626d7a;font-weight:550;font-size:13px}.nav-item svg{width:19px;height:19px;color:#9ba3ae;flex-shrink:0}.nav-item.active{background:#f2eff9;color:#59488e}.nav-item.active svg{color:#7766a9}.nav-item:not(.active):hover{background:#f7f8fa}.sidebar-bottom{margin-top:auto;padding:16px;border:1px solid var(--line);background:#fafbfc;border-radius:12px;color:#87909c;font-size:11px;line-height:1.6}
.main{min-width:0}.topbar{height:78px;background:#fff;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center;padding:0 38px;gap:18px}.breadcrumb{color:#8b94a0;font-size:12px}.breadcrumb b{color:#3c4654;font-weight:650}.user{display:flex;align-items:center;gap:13px}.avatar{height:35px;width:35px;display:grid;place-items:center;background:#eef0f3;border:1px solid #e1e4e9;color:#68727f;border-radius:50%;font-weight:750}.user-details{line-height:1.4}.user-details strong{display:block;font-size:12px}.user-details small{color:var(--muted);font-size:11px}.logout{background:#fff;border:1px solid var(--line);border-radius:9px;padding:9px 12px;color:#626b79;font-size:12px;margin-left:6px}.logout:hover{background:#f7f8fa}
.content{max-width:1400px;margin:auto;padding:38px}.back{display:inline-flex;align-items:center;gap:8px;color:#7a8290;font-size:12px;font-weight:600;margin-bottom:23px}.back:hover{color:var(--purple)}.back svg{width:15px;height:15px}.heading{display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;margin-bottom:26px}.eyebrow{color:#8b7ab3;text-transform:uppercase;font-weight:750;letter-spacing:1.7px;font-size:10px}h1{font-size:30px;letter-spacing:-1px;margin:9px 0 8px;font-weight:760}.lead{color:var(--muted);margin:0;line-height:1.7;font-size:13px}.primary{display:inline-flex;align-items:center;justify-content:center;gap:9px;border-radius:10px;padding:12px 17px;background:var(--purple);color:#fff;font-weight:650;font-size:12px;box-shadow:0 5px 12px #6554a41c}.primary:hover{background:#52428c}.primary svg{width:17px;height:17px}
.panel{background:#fff;border:1px solid var(--line);border-radius:15px;overflow:hidden}.panel-head{padding:20px 22px;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;gap:12px}.panel-head h2{font-size:15px;margin:0}.count{font-size:11px;color:var(--muted)}.table-scroll{overflow-x:auto}table{width:100%;border-collapse:collapse;min-width:900px}th{text-align:left;font-size:11px;font-weight:700;color:#87909c;background:#fafbfc;padding:15px 18px;white-space:nowrap}td{padding:17px 18px;border-top:1px solid #eef0f3;font-size:12px;color:#4b5563;vertical-align:middle}tbody tr:hover{background:#fcfcfe}.transaction-name{font-weight:700;color:#293240}.company-name{font-weight:600;color:#46515f}.muted{color:#9aa2ad}.status{display:inline-block;padding:6px 10px;border-radius:20px;font-size:10px;font-weight:700}.status-completed{background:#edf5ef;color:#537963}.status-pending{background:#fff6e5;color:#9b772e}.actions{display:flex;align-items:center;gap:8px}.actions form{margin:0}.icon-action{display:inline-flex;align-items:center;justify-content:center;gap:7px;min-height:35px;padding:8px 11px;background:#fff;border:1px solid #e2e6eb;border-radius:8px;color:#697481;font-size:11px;font-weight:650;white-space:nowrap}.icon-action svg{width:15px;height:15px;color:#929aa6}.icon-action:hover{background:#f7f8fa;border-color:#cbd1da}.icon-action.delete{border-color:#d98b8b;color:#b45353}.icon-action.delete:hover{background:#fff5f5;border-color:#c96b6b}.icon-action.delete svg{color:#929aa6}.empty{text-align:center;padding:38px;color:var(--muted)}.alert{padding:13px 16px;border-radius:10px;margin-bottom:17px;font-size:12px;border:1px solid var(--line);background:#fff}.alert-success{color:#386a4b;border-color:#c8e0d0}.alert-error{color:#a13f3f;border-color:#e8bcbc}.footer{text-align:center;color:#a1a8b2;font-size:11px;padding:25px 20px 40px}
@media(max-width:800px){.app{display:block}.sidebar{padding:16px;gap:15px;border-right:0;border-bottom:1px solid var(--line)}.nav-label,.sidebar-bottom{display:none}.nav-list{display:flex;overflow-x:auto}.nav-item{white-space:nowrap;padding:10px 12px}.topbar{height:65px;padding:0 18px}.content{padding:23px 18px}}@media(max-width:520px){.heading h1{font-size:25px}.primary{width:100%}.user-details{display:none}}
</style>
</head>
<body>
@php
$icons = [
 'golf'=>'<path d="M5 21V4"/><path d="M5 4c5-3 8 3 14 0v10c-6 3-9-3-14 0"/>',
 'grid'=>'<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>',
 'list'=>'<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/>',
 'briefcase'=>'<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/>',
 'file'=>'<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/>',
 'plus'=>'<path d="M12 5v14M5 12h14"/>',
 'back'=>'<path d="M19 12H5m6 6-6-6 6-6"/>',
 'eye'=>'<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
 'trash'=>'<path d="M3 6h18M8 6V4h8v2M5 6l1 15h12l1-15M10 10v7M14 10v7"/>',
];
@endphp
<div class="app">
<aside class="sidebar">
 <div class="logo"><div class="logo-mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $icons['golf'] !!}</svg></div><div><strong>BHE Golf Events</strong><small>Management Workspace</small></div></div>
 <nav aria-label="Main navigation"><div class="nav-label">WORKSPACE</div><div class="nav-list">
  <a href="/clients" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $icons['grid'] !!}</svg>Dashboard</a>
  <a href="/transactions" class="nav-item active" aria-current="page"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $icons['list'] !!}</svg>Transactions</a>
  <a href="/clients#companies" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $icons['briefcase'] !!}</svg>Companies</a>
  <a href="{{ route('bir.index') }}" class="nav-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $icons['file'] !!}</svg>BIR Documents</a>
 </div></nav>
 <div class="sidebar-bottom">A centralized workspace for company records, golf event transactions, and supporting documents.</div>
</aside>
<div class="main">
 <header class="topbar"><div class="breadcrumb">Workspace &nbsp;/&nbsp; <b>Transactions</b></div><div class="user"><div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div><div class="user-details"><strong>{{ auth()->user()->name ?? 'User' }}</strong><small>{{ ucfirst(auth()->user()->role ?? 'staff') }} account</small></div><form action="{{ route('logout') }}" method="POST" style="margin:0">@csrf<button class="logout" type="submit">Log out</button></form></div></header>
 <main class="content">
  <a class="back" href="/clients"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $icons['back'] !!}</svg>Back to Dashboard</a>
  <div class="heading"><div><div class="eyebrow">Transaction management</div><h1>All Transactions</h1><p class="lead">View company transactions and manage their supporting documents.</p></div><a class="primary" href="/transactions/create"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">{!! $icons['plus'] !!}</svg>Add New Transaction</a></div>
  @if(session('success'))<div class="alert alert-success" role="status">{{ session('success') }}</div>@endif
  @if(session('error'))<div class="alert alert-error" role="alert">{{ session('error') }}</div>@endif
  @if($errors->any())<div class="alert alert-error" role="alert">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
  <section class="panel" aria-label="All transactions"><div class="panel-head"><h2>Transaction Records</h2><span class="count">{{ $transactions->count() }} {{ $transactions->count() === 1 ? 'transaction' : 'transactions' }}</span></div><div class="table-scroll"><table><thead><tr><th>Company</th><th>Transaction</th><th>Date</th><th>Amount</th><th>PO Number</th><th>Status</th><th>Actions</th></tr></thead><tbody>
   @forelse($transactions as $transaction)
   <tr>
    <td class="company-name">{{ $transaction->client->client_name ?? 'Unknown' }}</td>
    <td class="transaction-name">{{ $transaction->transaction_name }}</td>
    <td>{{ $transaction->transaction_date }}</td>
    <td>{{ $transaction->amount === null ? '—' : '₱' . number_format($transaction->amount, 2) }}</td>
    <td>{{ $transaction->po_number ?: '—' }}</td>
    <td>@if($transaction->status === 'completed')<span class="status status-completed">Completed</span>@else<span class="status status-pending">{{ ucfirst($transaction->status ?? 'pending') }}</span>@endif</td>
    <td><div class="actions">
     <a class="icon-action" href="/transactions/{{ $transaction->id }}/documents" title="View documents for {{ $transaction->transaction_name }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $icons['eye'] !!}</svg>View</a>
     <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Delete this transaction? This action cannot be undone.');">@csrf @method('DELETE')<button type="submit" class="icon-action delete" title="Delete transaction"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $icons['trash'] !!}</svg>Delete</button></form>
    </div></td>
   </tr>
   @empty<tr><td class="empty" colspan="7">No transactions yet. Add a transaction to get started.</td></tr>@endforelse
  </tbody></table></div></section>
 </main>
 <footer class="footer">BHE Golf Events &middot; Transaction &amp; Document Management System</footer>
</div></div>
</body>
</html>
