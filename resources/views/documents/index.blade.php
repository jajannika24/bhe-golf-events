<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transaction Documents | BHE Golf Events</title>
<style>
    * { box-sizing: border-box; }
    body {
        margin: 0;
        background: #f6f8f6;
        color: #17231c;
        font-family: Arial, Helvetica, sans-serif;
    }
    .container {
        max-width: 1500px;
        margin: 0 auto;
        padding: 45px 32px;
    }
    .back {
        color: #347943;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }
    h1 {
        color: #26733b;
        font-size: 32px;
        margin: 22px 0 12px;
    }
    .subtitle { color: #647268; margin-bottom: 36px; }
    .section-title { font-size: 22px; margin-bottom: 8px; }
    .section-desc {
        color: #78847c;
        font-size: 14px;
        margin-bottom: 26px;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 18px;
    }
    .doc-card {
        position: relative;
        background: white;
        border: 1px solid #e0e8e1;
        border-radius: 14px;
        padding: 24px;
        min-height: 270px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 2px 8px rgba(0,0,0,.025);
    }
    .status {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .status.done { background: #2e7d43; color: white; }
    .status.empty { border: 2px solid #cbd6cd; background: white; }
    .document-icon {
        margin: 8px 0 20px;
        color: #62816a;
    }
    .document-icon svg { width: 38px; height: 38px; }
    .doc-title {
        font-size: 17px;
        font-weight: 700;
        margin: 0 0 12px;
    }
    .filename {
        color: #4d6655;
        font-size: 13px;
        overflow-wrap: anywhere;
        display: flex;
        align-items: flex-start;
        gap: 6px;
        margin-bottom: 22px;
    }
    .no-file { color: #98a29a; font-size: 13px; margin-bottom: 22px; }
    .actions {
        margin-top: auto;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .actions form { margin: 0; }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 37px;
        padding: 9px 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
    }
    .btn svg { width: 15px; height: 15px; }
    .btn-primary { background: #2d7a42; color: white; border: 1px solid #2d7a42; }
    .btn-outline { background: white; color: #2d7a42; border: 1px solid #b7d2be; }
    .btn-primary:hover { background: #205e32; }
    .btn-outline:hover { background: #edf6ef; }
    .message { margin-bottom: 20px; color: #26733b; }
    @media (max-width: 600px) {
        .container { padding: 26px 18px; }
        h1 { font-size: 25px; }
    }
</style>
</head>
<body>
<div class="container">

    <a class="back" href="/clients/{{ $transaction->client_id }}/transactions">
        &larr; Back to Transactions
    </a>

    <h1>{{ $transaction->transaction_name }}</h1>
    <p class="subtitle">Company: {{ $transaction->client->company_name }}</p>

    <h2 class="section-title">Transaction Documents</h2>
    <p class="section-desc">Manage and preview files associated with this transaction.</p>

    @if(session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="message" style="color:#b42318">{{ $error }}</p>
        @endforeach
    @endif

    <div class="grid">
        @foreach(['Purchase Order', 'Signed Quotation', 'Invoice', 'Proof of Payment', 'Collection Receipt', 'BIR 2307', 'Other'] as $type)
            @php
                $matching = $documents->where('document_type', $type);
                if ($type === 'Signed Quotation') {
                    $matching = $matching->merge($documents->where('document_type', 'Quotation'));
                }
                $latest = $matching->sortByDesc('id')->first();
            @endphp

            <div class="doc-card">

                @if($latest)
                    <div class="status done" title="Document uploaded">
                        <svg width="15" height="15" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="3"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12l4 4L19 6"/>
                        </svg>
                    </div>
                @else
                    <div class="status empty" title="No document uploaded"></div>
                @endif

                <div class="document-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <path d="M14 2v6h6M8 13h8M8 17h8"/>
                    </svg>
                </div>

                <h3 class="doc-title">{{ $type }}</h3>

                @if($latest)
                    <div class="filename">
                        <svg width="15" height="15" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round"
                             style="flex-shrink:0">
                            <path d="M21.4 11.6l-8.5 8.5a6 6 0 0 1-8.5-8.5l9.2-9.2a4 4 0 0 1 5.7 5.7l-9.2 9.2a2 2 0 0 1-2.8-2.8l8.5-8.5"/>
                        </svg>
                        <span>{{ $latest->file_name }}</span>
                    </div>
                @else
                    <div class="no-file">No file uploaded</div>
                @endif

                <div class="actions">
                    <form action="/documents" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                        <input type="hidden" name="document_type" value="{{ $type }}">

                        <label class="btn btn-primary">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 16V4M7 9l5-5 5 5M4 16v4h16v-4"/>
                            </svg>
                            {{ $latest ? 'Add / Replace' : 'Add File' }}
                            <input type="file" name="document_file"
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   style="display:none"
                                   onchange="if(this.files.length) this.form.requestSubmit()">
                        </label>
                    </form>

                    @if($latest)
                        <a class="btn btn-outline"
                           href="/documents/{{ $latest->id }}/download"
                           target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            Preview
                        </a>
                    @endif
                </div>

            </div>
        @endforeach
    </div>

</div>
</body>
</html>