<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transaction Documents | BHE Golf Events</title>
<style>
:root{--bg:#f5f6f8;--white:#fff;--ink:#202633;--muted:#7c8593;--line:#e8ebef;--purple:#6554a4;--purple-light:#f3f0fb;--icon:#929aa6}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font:14px Inter,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}a{text-decoration:none;color:inherit}button,input{font:inherit}.app{min-height:100vh;display:grid;grid-template-columns:252px minmax(0,1fr)}
.sidebar{background:#fff;border-right:1px solid var(--line);padding:27px 17px;display:flex;flex-direction:column;gap:34px}.logo{display:flex;align-items:center;gap:12px;padding:0 10px}.logo-mark{height:43px;width:43px;border:1px solid #e5e7eb;border-radius:12px;background:#f3f4f6;display:grid;place-items:center;color:#8d96a2}.logo-mark svg{width:23px;height:23px}.logo strong{font-size:15px}.logo small{display:block;color:var(--muted);font-size:11px;margin-top:4px}.nav-label{padding:0 13px;margin-bottom:11px;color:#a1a8b2;font-size:10px;font-weight:750;letter-spacing:1.5px}.nav-list{display:grid;gap:5px}.nav-item{display:flex;align-items:center;gap:12px;padding:13px 14px;border-radius:10px;color:#626d7a;font-weight:550;font-size:13px}.nav-item svg{width:19px;height:19px;color:#9ba3ae;flex-shrink:0}.nav-item.active{background:var(--purple-light);color:#59488e}.nav-item.active svg{color:#7766a9}.nav-item:not(.active):hover{background:#f7f8fa}.sidebar-bottom{margin-top:auto;padding:16px;border:1px solid var(--line);background:#fafbfc;border-radius:12px;color:#87909c;font-size:11px;line-height:1.6}
.main{min-width:0}.topbar{height:78px;background:#fff;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;align-items:center;padding:0 38px;gap:18px}.breadcrumb{color:#8b94a0;font-size:12px}.breadcrumb b{color:#3c4654}.user{display:flex;align-items:center;gap:13px}.avatar{height:35px;width:35px;display:grid;place-items:center;background:#eef0f3;border:1px solid #e1e4e9;color:#68727f;border-radius:50%;font-weight:750}.user-details strong{display:block;font-size:12px}.user-details small{color:var(--muted);font-size:11px}.logout{background:#fff;border:1px solid var(--line);border-radius:9px;padding:9px 12px;color:#626b79;font-size:12px;cursor:pointer}
.content{max-width:1370px;margin:auto;padding:38px}.back{display:inline-flex;align-items:center;gap:8px;color:#6f7582;font-size:12px;font-weight:650;margin-bottom:24px}.back:hover{color:var(--purple)}.back svg{width:16px;height:16px}.eyebrow{color:#8b7ab3;text-transform:uppercase;font-weight:750;letter-spacing:1.7px;font-size:10px}h1{font-size:30px;letter-spacing:-1px;margin:9px 0 8px}.subtitle{color:var(--muted);margin:0 0 32px;line-height:1.6}.section-head{display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:18px}.section-head h2{font-size:17px;margin:0 0 6px}.section-head p{font-size:12px;color:var(--muted);margin:0}.count{font-size:11px;color:#82729f;background:var(--purple-light);padding:8px 11px;border-radius:8px}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(255px,1fr));gap:16px}.doc-card{background:#fff;border:1px solid var(--line);border-radius:15px;padding:23px;min-height:250px;display:flex;flex-direction:column;gap:0}.card-top{display:flex;align-items:flex-start;justify-content:space-between;gap:10px}.document-icon{width:48px;height:48px;display:grid;place-items:center;border:1px solid #e8eaee;background:#f2f3f5;border-radius:12px;color:var(--icon)}.document-icon svg{width:24px;height:24px}.status{width:23px;height:23px;border-radius:50%;display:grid;place-items:center;color:#8e98a4;border:1px solid #dce0e6}.status svg{width:15px;height:15px}.status.empty{background:#fafbfc}.doc-title{font-size:15px;margin:18px 0 8px}.filename{color:#697481;font-size:12px;display:flex;gap:7px;align-items:flex-start;overflow-wrap:anywhere;min-height:36px;line-height:1.5}.filename svg{width:15px;height:15px;flex-shrink:0;color:var(--icon)}.no-file{color:#a0a7b0;font-size:12px;min-height:36px}.actions{display:flex;gap:7px;flex-wrap:wrap;margin-top:auto;padding-top:16px;border-top:1px solid #f0f1f3}.actions form{margin:0}.btn{display:inline-flex;align-items:center;justify-content:center;gap:6px;min-height:35px;padding:8px 10px;background:#fff;color:#6c7581;border:1px solid #e1e5eb;border-radius:8px;font-size:11px;font-weight:650;cursor:pointer;white-space:nowrap}.btn svg{width:15px;height:15px;stroke:currentColor}.btn:hover{background:#f6f5fa;border-color:#c9c0df;color:#6554a4}.btn-upload{background:#f3f0fb;color:#6554a4;border-color:#e5def5}.btn-upload:hover{background:#eae5f7}.btn-delete:hover{color:#a44848;background:#fcf6f6;border-color:#e6c9c9}.file-input{position:absolute;width:1px;height:1px;opacity:0;overflow:hidden}.message{background:#fff;border:1px solid #dce6df;color:#416c4c;border-radius:10px;padding:13px 16px;margin-bottom:18px;font-size:12px}.message.error{border-color:#f0d5d5;color:#a44848}.footer{text-align:center;color:#a1a8b2;font-size:11px;padding:25px 20px 40px}
@media(max-width:800px){.app{display:block}.sidebar{padding:16px;gap:15px;border-right:0;border-bottom:1px solid var(--line)}.nav-label,.sidebar-bottom{display:none}.nav-list{display:flex;overflow-x:auto}.nav-item{white-space:nowrap;padding:10px 12px}.topbar{height:65px;padding:0 18px}.content{padding:23px 18px}}@media(max-width:520px){h1{font-size:25px}.user-details{display:none}.grid{grid-template-columns:1fr}}
/* Subtle red outline for Delete; gray vector trash icon */
.btn-delete{background:#fff;color:#b45353;border:1px solid #d98b8b}
.btn-delete svg{color:#929aa6;stroke:#929aa6}
.btn-delete:hover{background:#fff5f5;color:#a44848;border-color:#c96b6b}
</style>
</head>
<body>
@php
$svg = [
'grid'=>'<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>',
'list'=>'<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5"/>',
'briefcase'=>'<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/>',
'file'=>'<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h8"/>',
'eye'=>'<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
'replace'=>'<path d="M20 7v5h-5M4 17v-5h5"/><path d="M5.7 9A7 7 0 0 1 18 7l2 5M4 12l2 5a7 7 0 0 0 12.3-2"/>',
'delete'=>'<path d="M3 6h18M8 6V4h8v2M5 6l1 15h12l1-15M10 10v7M14 10v7"/>',
'upload'=>'<path d="M12 16V4M7 9l5-5 5 5M4 16v4h16v-4"/>',
'back'=>'<path d="M19 12H5m6 6-6-6 6-6"/>',
'check'=>'<path d="M5 12l4 4L19 6"/>',
'clip'=>'<path d="M21.4 11.6l-8.5 8.5a6 6 0 0 1-8.5-8.5l9.2-9.2a4 4 0 0 1 5.7 5.7l-9.2 9.2a2 2 0 0 1-2.8-2.8l8.5-8.5"/>'
];
$icon = fn($name) => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.$svg[$name].'</svg>';
$types = ['Purchase Order','Signed Quotation','Invoice','Proof of Payment','Collection Receipt','BIR 2307','Other'];
@endphp
<div class="app">
<aside class="sidebar">
<div class="logo"><div class="logo-mark">{!! $icon('file') !!}</div><div><strong>BHE Golf Events</strong><small>Management Workspace</small></div></div>
<nav aria-label="Main navigation"><div class="nav-label">WORKSPACE</div><div class="nav-list">
<a href="/clients" class="nav-item">{!! $icon('grid') !!} Dashboard</a>
<a href="/transactions" class="nav-item active">{!! $icon('list') !!} Transactions</a>
<a href="/clients#companies" class="nav-item">{!! $icon('briefcase') !!} Companies</a>
<a href="{{ route('bir.index') }}" class="nav-item">{!! $icon('file') !!} BIR Documents</a>
</div></nav><div class="sidebar-bottom">A centralized workspace for company records, golf event transactions, and supporting documents.</div>
</aside>
<div class="main"><header class="topbar"><div class="breadcrumb">Workspace &nbsp;/&nbsp; Transactions &nbsp;/&nbsp; <b>Documents</b></div><div class="user"><div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div><div class="user-details"><strong>{{ auth()->user()->name }}</strong><small>{{ ucfirst(auth()->user()->role ?? 'staff') }} account</small></div><form action="{{ route('logout') }}" method="POST" style="margin:0">@csrf<button class="logout" type="submit">Log out</button></form></div></header>
<main class="content">
<a class="back" href="/clients/{{ $transaction->client_id }}/transactions">{!! $icon('back') !!} Back to Transactions</a>
<div class="eyebrow">Transaction workspace</div><h1>{{ $transaction->transaction_name }}</h1>
<p class="subtitle">Company: {{ $transaction->client->client_name ?? $transaction->client->company_name ?? 'N/A' }}</p>
<div class="section-head"><div><h2>Transaction Documents</h2><p>Upload, replace, preview, and delete files associated with this transaction.</p></div><span class="count">7 document types</span></div>
@if(session('success'))<div class="message" role="status">{{ session('success') }}</div>@endif
@if($errors->any())<div class="message error" role="alert">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
<div class="grid">
@foreach($types as $type)
@php
$matching = $documents->where('document_type', $type);
if ($type === 'Signed Quotation') {$matching = $matching->merge($documents->where('document_type', 'Quotation'));}
$latest = $matching->sortByDesc('id')->first();
@endphp
<article class="doc-card">
<div class="card-top"><div class="document-icon">{!! $icon('file') !!}</div>
@if($latest)<div class="status" title="Document uploaded" aria-label="Uploaded">{!! $icon('check') !!}</div>@else<div class="status empty" title="No document uploaded" aria-label="Empty"></div>@endif
</div>
<h3 class="doc-title">{{ $type }}</h3>
@if($latest)<div class="filename">{!! $icon('clip') !!}<span>{{ $latest->file_name }}</span></div>@else<div class="no-file">No file uploaded</div>@endif
<div class="actions">
@if($latest)
<form action="{{ route('documents.update', $latest) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
<label class="btn btn-upload">{!! $icon('replace') !!} Replace<input class="file-input" type="file" name="document_file" accept=".pdf,.jpg,.jpeg,.png" aria-label="Replace {{ $type }}" onchange="if(this.files.length) this.form.requestSubmit()"></label>
</form>
<a class="btn" href="/documents/{{ $latest->id }}/download" target="_blank" rel="noopener">{!! $icon('eye') !!} Preview</a>
<form action="{{ route('documents.destroy', $latest) }}" method="POST" onsubmit="return confirm('Delete this {{ $type }} document? This cannot be undone.');">@csrf @method('DELETE')<button class="btn btn-delete" type="submit">{!! $icon('delete') !!} Delete</button></form>
@else
<form action="/documents" method="POST" enctype="multipart/form-data">@csrf
<input type="hidden" name="transaction_id" value="{{ $transaction->id }}"><input type="hidden" name="document_type" value="{{ $type }}">
<label class="btn btn-upload">{!! $icon('upload') !!} Add File<input class="file-input" type="file" name="document_file" accept=".pdf,.jpg,.jpeg,.png" aria-label="Upload {{ $type }}" onchange="if(this.files.length) this.form.requestSubmit()"></label>
</form>
@endif
</div></article>
@endforeach
</div></main><footer class="footer">BHE Golf Events &middot; Transaction &amp; Document Management System</footer></div></div>
</body></html>