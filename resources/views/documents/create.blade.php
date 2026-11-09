
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BHE Golf Events - Upload Document</title>
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
            max-width: 750px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h2 {
            color: #301451;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #746782;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border: 1px solid #e8def3;
            border-radius: 14px;
            box-shadow: 0 5px 18px #31134d0a;
        }

        .field-label {
            display: block;
            margin: 22px 0 9px;
            color: #422166;
            font-weight: bold;
            font-size: 14px;
        }

        select,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #d9c9ea;
            border-radius: 8px;
            background: white;
            font-size: 14px;
        }

        select:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: #7b4bc1;
        }

        .document-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .document-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 2px solid #e8def3;
            padding: 14px;
            border-radius: 9px;
            cursor: pointer;
            background: #fff;
            font-size: 13px;
            margin: 0;
        }

        .document-box:has(input:checked) {
            border-color: #6d35b0;
            background: #f1e8ff;
        }

        .document-box input {
            accent-color: #5b2ca0;
        }

        .file-note {
            color: #786b87;
            font-size: 12px;
            margin-top: 9px;
            line-height: 1.5;
        }

        .button {
            background: #5b2ca0;
            color: white;
            border: none;
            padding: 13px 20px;
            margin-top: 26px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background: #432078;
        }

        .alert {
            padding: 14px 17px;
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

        .alert-error p {
            margin: 5px 0;
        }

        .back-link {
            display: inline-block;
            margin: 22px 0;
            color: #5b2ca0;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .document-options {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 20px;
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

        <h2>Upload Document</h2>

        <p class="subtitle">
            Attach a document to an existing golf event transaction.
        </p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Upload failed:</strong>

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form
            action="/documents"
            method="POST"
            enctype="multipart/form-data"
            class="form-card"
        >
            @csrf

            <label class="field-label" for="transaction_id">
                Transaction *
            </label>

            <select
                id="transaction_id"
                name="transaction_id"
                required
            >
                <option value="">Select Transaction</option>

                @foreach ($transactions as $transaction)
                    <option
                        value="{{ $transaction->id }}"
                        {{ old('transaction_id', request('transaction_id')) == $transaction->id ? 'selected' : '' }}
                    >
                        {{ $transaction->client->client_name ?? 'Unknown Client' }}
                        - {{ $transaction->transaction_name }}
                    </option>
                @endforeach
            </select>

            <label class="field-label">
                Document Type *
            </label>

            <div class="document-options">

                @foreach ([
                    'Purchase Order',
                    'Signed Quotation',
                    'Invoice',
                    'Proof of Payment',
                    'Collection Receipt',
                    'BIR 2307',
                    'Other'
                ] as $type)

                    <label class="document-box">
                        <input
                            type="radio"
                            name="document_type"
                            value="{{ $type }}"
                            {{ old('document_type') == $type ? 'checked' : '' }}
                            required
                        >

                        {{ $type }}
                    </label>

                @endforeach

            </div>

            <label class="field-label" for="document_file">
                Choose File *
            </label>

            <!-- No accept restriction so TC-007 can test MP3 rejection -->
            <input
                type="file"
                id="document_file"
                name="document_file"
                required
            >

            <p class="file-note">
                Allowed uploads: PDF, JPG, JPEG, PNG (maximum 10 MB).
                Other file types can be selected for testing,
                but the server should reject them.
            </p>

            <button type="submit" class="button">
                Upload Document
            </button>

        </form>

        <a href="/transactions" class="back-link">
            ← Back to Transactions
        </a>

    </main>

</body>
</html>
