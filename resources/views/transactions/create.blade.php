
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BHE Golf Events - Add Transaction</title>
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
            padding: 25px 35px;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
        }

        .header p {
            margin: 8px 0 0;
            color: #ddd0f6;
            font-size: 13px;
        }

        .container {
            max-width: 700px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h2 {
            color: #301451;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #746782;
            margin-bottom: 25px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #e8def3;
            box-shadow: 0 5px 18px #31134d0a;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
            color: #422166;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d9c9ed;
            border-radius: 8px;
            background: white;
            color: #2b2040;
            font: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #7040b3;
            box-shadow: 0 0 0 3px #7040b31a;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .hint {
            font-size: 12px;
            color: #786b87;
            margin-top: 7px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .save-button {
            background: #5b2ca0;
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .save-button:hover {
            background: #432078;
        }

        .cancel-button {
            background: #f0e9f9;
            color: #4c1d95;
            padding: 13px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }

        .errors {
            background: #fff0f0;
            border: 1px solid #efb6b6;
            color: #9c2525;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        @media (max-width: 600px) {
            .header {
                padding: 22px 20px;
            }

            .form-card {
                padding: 22px;
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

        <h2>Add New Transaction</h2>
        <p class="subtitle">
            Enter the transaction details below.
        </p>

        <form
            action="/transactions"
            method="POST"
            class="form-card"
        >
            @csrf

            @if ($errors->any())
                <div class="errors">
                    <strong>Please correct the following:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="client_id">Client *</label>
            <select name="client_id" id="client_id" required>
                <option value="">Select Client</option>

                @foreach ($clients as $client)
                    <option
                        value="{{ $client->id }}"
                        {{ old('client_id') == $client->id ? 'selected' : '' }}
                    >
                        {{ $client->client_name }}
                    </option>
                @endforeach
            </select>

            <label for="transaction_name">
                Transaction Name *
            </label>
            <input
                type="text"
                name="transaction_name"
                id="transaction_name"
                value="{{ old('transaction_name') }}"
                required
            >

            <label for="transaction_date">
                Transaction Date *
            </label>
            <input
                type="date"
                name="transaction_date"
                id="transaction_date"
                value="{{ old('transaction_date') }}"
                required
            >

            <label for="status">
                Transaction Status *
            </label>
            <select name="status" id="status" required>
                <option
                    value="pending"
                    {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}
                >
                    Pending
                </option>

                <option
                    value="completed"
                    {{ old('status') === 'completed' ? 'selected' : '' }}
                >
                    Completed
                </option>
            </select>

            <p class="hint">
                Staff will not be allowed to delete completed transactions.
            </p>

            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
            >{{ old('description') }}</textarea>

            <label for="amount">Amount (PHP)</label>
            <input
                type="number"
                name="amount"
                id="amount"
                step="0.01"
                min="0"
                value="{{ old('amount') }}"
            >

            <label for="po_number">PO Number</label>
            <input
                type="text"
                name="po_number"
                id="po_number"
                value="{{ old('po_number') }}"
            >

            <label for="quotation_number">
                Quotation Number
            </label>
            <input
                type="text"
                name="quotation_number"
                id="quotation_number"
                value="{{ old('quotation_number') }}"
            >

            <label for="invoice_number">
                Invoice Number
            </label>
            <input
                type="text"
                name="invoice_number"
                id="invoice_number"
                value="{{ old('invoice_number') }}"
            >

            <div class="actions">
                <button type="submit" class="save-button">
                    Save Transaction
                </button>

                <a href="/transactions" class="cancel-button">
                    Cancel
                </a>
            </div>

        </form>

    </main>

</body>
</html>
