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


    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <div class="grid">
        @foreach (['Purchase Order', 'Signed Quotation', 'Invoice', 'Proof of Payment', 'Collection Receipt', 'BIR 2307', 'Other'] as $type)
            @php
                $matching = $documents->where('document_type', $type);
                if ($type === 'Signed Quotation') {
                    $matching = $matching->merge($documents->where('document_type', 'Quotation'));
                }
                $latest = $matching->sortByDesc('id')->first();
            @endphp

            <div class="box">
                <div style="font-size:30px;">📄</div>
                <h3>{{ $type }}</h3>

                @if ($latest)
                    <p style="overflow-wrap:anywhere;">
                        📎 {{ $latest->file_name }}
                    </p>
                @else
                    <p style="color:#777;">No file yet.</p>
                @endif

                <form action="/documents" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="transaction_id"
                           value="{{ $transaction->id }}">
                    <input type="hidden" name="document_type"
                           value="{{ $type }}">

                    <label style="display:inline-block; background:#2e7d32;
                                  color:white; padding:10px; border-radius:6px;
                                  cursor:pointer; margin-bottom:10px;">
                        {{ $latest ? 'Add / Replace' : '+ Add File' }}
                        <input type="file" name="document_file"
                               accept=".pdf,.jpg,.jpeg,.png"
                               style="display:none;"
                               onchange="if(this.files.length) this.form.requestSubmit()">
                    </label>
                </form>

                @if ($latest)
                    <a href="/documents/{{ $latest->id }}/download"
                       target="_blank"
                       style="display:inline-block; padding:10px;
                              border:1px solid #2e7d32;
                              border-radius:6px; color:#2e7d32;
                              text-decoration:none;">
                        👁 Preview
                    </a>
                @else
                    <span style="color:#999;">Preview unavailable</span>
                @endif
            </div>
        @endforeach
    </div>

</body>
</html>
