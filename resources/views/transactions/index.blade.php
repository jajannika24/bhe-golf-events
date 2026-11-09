
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BHE Golf Events - Transactions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f2fb;
            color: #2b2040;
            margin: 0;
        }

        .header {
            background: linear-gradient(135deg, #24103f, #4c1d95);
            color: white;
            padding: 28px 35px;
        }

        .header h1 {
            margin: 0;
            font-size: 27px;
        }

        .header p {
            color: #ddd0f6;
            margin: 8px 0 0;
            font-size: 13px;
        }

        .container {
            max-width: 1250px;
            margin: 35px auto;
            padding: 0 22px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        h2 {
            color: #301451;
            margin: 0 0 8px;
            font-size: 26px;
        }

        .subtitle {
            color: #746782;
            font-size: 14px;
            margin: 0;
        }

        .button {
            display: inline-block;
            background: #5b2ca0;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .button:hover {
            background: #432078;
        }

        .back-link {
            display: inline-block;
            color: #5b2ca0;
            text-decoration: none;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .table-wrapper {
            background: white;
            border: 1px solid #e8def3;
            border-radius: 14px;
            overflow-x: auto;
            box-shadow: 0 5px 18px #31134d0a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th {
            background: #eee6fa;
            color: #422166;
            text-align: left;
            font-size: 13px;
            padding: 16px;
        }

        td {
            padding: 16px;
            border-top: 1px solid #f0eaf6;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover td {
            background: #fcfaff;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background: #fff2d8;
            color: #966000;
        }

        .status-completed {
            background: #e8f7ed;
            color: #247344;
        }

        .delete-button {
            background: #fff0f0;
            color: #ad3030;
            border: 1px solid #f0c8c8;
            padding: 9px 13px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .delete-button:hover {
            background: #ffe0e0;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #e8f7ed;
            color: #247344;
            border: 1px solid #b9e1c7;
        }

        .alert-error {
            background: #fff0f0;
            color: #ad3030;
            border: 1px solid #f0c8c8;
        }

        .test-note {
            margin-top: 18px;
            color: #786b87;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .header {
                padding: 24px 20px;
            }

            .container {
                margin-top: 25px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <h1>⛳ BHE Golf Events</h1>
        <p>Transaction & Document Management System</p>
    </header>

    <main class="container">

        <div class="top">
            <div>
                <h2>Transactions</h2>
                <p class="subtitle">
                    Manage golf event transactions for your clients.
                </p>
            </div>

            <a href="/transactions/create" class="button">
                + Add New Transaction
            </a>
        </div>

        <a href="/clients" class="back-link">
            ← Back to Clients
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Transaction</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>PO Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>
                                {{ $transaction->client->client_name ?? 'Unknown' }}
                            </td>

                            <td>
                                {{ $transaction->transaction_name }}
                            </td>

                            <td>
                                {{ $transaction->transaction_date }}
                            </td>

                            <td>
                                {{ $transaction->amount === null
                                    ? '—'
                                    : '₱' . number_format($transaction->amount, 2) }}
                            </td>

                            <td>
                                {{ $transaction->po_number ?: '—' }}
                            </td>

                            <td>
                                @if ($transaction->status === 'completed')
                                    <span class="status status-completed">
                                        Completed
                                    </span>
                                @else
                                    <span class="status status-pending">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td>
                                <form
                                    action="{{ route('transactions.destroy', $transaction->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this transaction?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7">
                                No transactions yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="test-note">
            TC-006: Staff users must not be able to delete completed transactions.
            Transactions with attached documents are also protected from deletion.
        </p>

    </main>

</body>
</html>
