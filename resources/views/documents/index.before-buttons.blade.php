<!DOCTYPE html>
<html>
<head>
    <title>BHE Golf Events - Documents</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f4; padding: 35px; }
        h1 { color: #2e7d32; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 15px; margin-top: 25px; }
        .box { background: white; padding: 22px; border: 1px solid #dce8dc; border-radius: 12px; }
        .button { display: inline-block; background: #2e7d32; color: white; padding: 12px 18px; text-decoration: none; border-radius: 8px; }
        .file { display: block; margin-top: 10px; color: #2e7d32; overflow-wrap: anywhere; }
    </style>
</head>
<body>
    <p><a href="/clients/{{ $transaction->client_id }}/transactions">← Back to Transactions</a></p>

    <h1>{{ $transaction->transaction_name }}</h1>
    <p>Company: {{ $transaction->client->client_name }}</p>
    <h2>Transaction Documents</h2>

    <a href="/documents/create?transaction_id={{ $transaction->id }}" class="button">+ Upload Document</a>

    <div class="grid">
        @foreach (['Purchase Order', 'Signed Quotation', 'Invoice', 'Proof of Payment', 'Collection Receipt', 'BIR 2307', 'Other'] as $type)
            <div class="box" style="cursor:pointer;" onclick="this.querySelector('input[type=file]').click()">
                <form action="/documents" method="POST" enctype="multipart/form-data" onclick="event.stopPropagation()">
                    @csrf
                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                    <input type="hidden" name="document_type" value="{{ $type }}">
                    <input type="file" name="document_file" accept=".pdf,.jpg,.jpeg,.png"
                           style="display:none"
                           onchange="if(this.files.length) this.form.requestSubmit()">
                </form>
                <div style="font-size:30px;">📄</div>
                <h3>{{ $type }}</h3>

                @php
                    $matching = $documents->where('document_type', $type);
                    if ($type === 'Signed Quotation') {
                        $matching = $matching->merge($documents->where('document_type', 'Quotation'));
                    }
                @endphp

                @forelse ($matching as $document)
                    <a class="file" href="/documents/{{ $document->id }}/download">
                        📎 {{ $document->file_name }}
                    </a>
                @empty
                    <p style="color:#777;">No document uploaded yet.</p>
                @endforelse
            </div>
        @endforeach
    </div>
</body>
</html>
