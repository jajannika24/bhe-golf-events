<!DOCTYPE html>
<html>
<head>
    <title>BHE Golf Events - Company Transactions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f4; padding: 35px; }
        h1 { color: #2e7d32; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 18px; margin-top: 25px; }
        .box { display: block; background: white; padding: 24px; border: 1px solid #dce8dc; border-radius: 12px; text-decoration: none; color: #222; }
        .box:hover { border-color: #2e7d32; background: #f0f8f0; }
        .button { display: inline-block; background: #2e7d32; color: white; padding: 12px 18px; text-decoration: none; border-radius: 8px; }
        .hint { color: #2e7d32; }
    </style>
</head>
<body>
    <p><a href="/clients">← Back to Companies</a></p>

    <h1>{{ $client->client_name }}</h1>
    <h2>Transactions</h2>
    <p>Golf events, shirt orders, and other client transactions.</p>

    <a href="/transactions/create" class="button">+ Add Transaction</a>

    <div class="grid">
        @forelse ($transactions as $transaction)
            <a href="/transactions/{{ $transaction->id }}/documents" class="box">
                <div style="font-size:32px;">📁</div>
                <h3>{{ $transaction->transaction_name }}</h3>
                <p>Date: {{ $transaction->transaction_date }}</p>
                <p>PO: {{ $transaction->po_number ?: 'Not provided' }}</p>
                <p class="hint">View Documents →</p>
            </a>
        @empty
            <p>No transactions yet for this company.</p>
        @endforelse
    </div>
</body>
</html>
