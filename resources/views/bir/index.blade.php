
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIR Invoice & Receipts | BHE Golf Events</title>

    <style>
        :root {
            --bg: #f7f8fb;
            --white: #ffffff;
            --text: #252a35;
            --muted: #858b99;
            --border: #e8eaf0;
            --purple: #7666b5;
            --purple-light: #f2effb;
            --gray-icon: #8d94a3;
            --success: #217b57;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, -apple-system, BlinkMacSystemFont,
                         "Segoe UI", sans-serif;
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input {
            font: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 252px;
            background: var(--white);
            border-right: 1px solid var(--border);
            padding: 28px 18px;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: var(--purple-light);
            color: var(--purple);
            display: grid;
            place-items: center;
            border-radius: 12px;
        }

        .brand-name {
            font-weight: 750;
            font-size: 15px;
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        .nav-label {
            padding: 10px 14px;
            color: #a0a5b0;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 1.2px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin: 4px 0;
            border-radius: 10px;
            color: #6e7584;
            font-weight: 550;
        }

        .nav-link:hover {
            background: #f6f6f9;
        }

        .nav-link.active {
            background: var(--purple-light);
            color: var(--purple);
            font-weight: 700;
        }

        .nav-link svg {
            width: 19px;
            height: 19px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            min-height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 38px;
        }

        .breadcrumb {
            color: var(--muted);
            font-size: 13px;
        }

        .breadcrumb strong {
            color: var(--text);
            font-weight: 650;
        }

        .account {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--purple-light);
            color: var(--purple);
            font-weight: 750;
        }

        .account-name {
            font-weight: 650;
            font-size: 13px;
        }

        .account-role {
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        .content {
            max-width: 1180px;
            margin: 0 auto;
            padding: 36px 38px 70px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .eyebrow {
            color: var(--purple);
            font-size: 11px;
            letter-spacing: 1.3px;
            font-weight: 750;
            margin-bottom: 9px;
        }

        h1 {
            font-size: 29px;
            letter-spacing: -0.8px;
            margin: 0 0 9px;
            font-weight: 750;
        }

        .subtitle {
            color: var(--muted);
            margin: 0;
            line-height: 1.6;
        }

        .heading-icon {
            width: 56px;
            height: 56px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            display: grid;
            place-items: center;
            color: var(--gray-icon);
        }

        .heading-icon svg {
            width: 27px;
            height: 27px;
        }

        .panel {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 28px;
            margin-bottom: 24px;
            box-shadow: 0 5px 24px rgba(35, 40, 65, .025);
        }

        .panel-title {
            font-size: 17px;
            font-weight: 750;
            margin: 0 0 6px;
        }

        .panel-description {
            color: var(--muted);
            font-size: 12px;
            margin: 0 0 24px;
            line-height: 1.6;
        }

        .field-label {
            display: block;
            font-weight: 650;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .text-input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid var(--border);
            border-radius: 10px;
            outline: none;
            background: #fff;
            color: var(--text);
        }

        .text-input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 3px var(--purple-light);
        }

        .upload-grid {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 20px;
            align-items: start;
        }

        .upload-box {
            border: 1.5px dashed #cfd2dc;
            border-radius: 12px;
            background: #fbfbfd;
            padding: 20px;
            text-align: center;
        }

        .upload-box svg {
            width: 28px;
            height: 28px;
            color: var(--gray-icon);
            margin-bottom: 9px;
        }

        .upload-box input {
            display: block;
            width: 100%;
            margin-top: 12px;
            font-size: 12px;
        }

        .upload-help {
            color: var(--muted);
            font-size: 11px;
            margin-top: 9px;
        }

        .button {
            border: 0;
            background: var(--purple);
            color: #fff;
            padding: 12px 19px;
            border-radius: 10px;
            font-weight: 650;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
        }

        .button:hover {
            background: #6755a6;
        }

        .button svg {
            width: 17px;
            height: 17px;
        }

        .button-secondary {
            background: #fff;
            color: var(--purple);
            border: 1px solid #dcd6f2;
        }

        .button-secondary:hover {
            background: var(--purple-light);
        }

        .button:disabled {
            opacity: .5;
            cursor: not-allowed;
        }

        .upload-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .notice {
            border-radius: 10px;
            padding: 13px 15px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .notice-success {
            background: #eef8f2;
            color: var(--success);
        }

        .notice-error {
            background: #fff1f1;
            color: #ae3838;
        }

        .library-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .count {
            color: var(--muted);
            font-size: 12px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .search-form .text-input {
            flex: 1;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            padding: 14px 12px;
            background: #f9fafc;
            color: #9298a5;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .6px;
            font-weight: 750;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .file-cell {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .file-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #f4f5f8;
            color: var(--gray-icon);
            display: grid;
            place-items: center;
            flex-shrink: 0;
        }

        .file-icon svg {
            width: 19px;
            height: 19px;
        }

        .invoice-number {
            font-weight: 700;
            font-size: 13px;
        }

        .filename {
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
            overflow-wrap: anywhere;
        }

        .table-link {
            color: var(--purple);
            font-weight: 650;
            font-size: 12px;
            margin-right: 12px;
        }

        .table-link:hover {
            text-decoration: underline;
        }

        .compile-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-top: 24px;
        }

        .selection-count {
            color: var(--muted);
            font-size: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 45px 15px;
            color: var(--muted);
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav svg {
            width: 20px;
        }

        .logout {
            border: 0;
            background: none;
            color: #858b99;
            cursor: pointer;
            font-size: 12px;
            margin-left: 12px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 205px;
            }

            .content {
                padding: 28px 20px;
            }

            .topbar {
                padding: 15px 20px;
            }

            .upload-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 14px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                padding-bottom: 10px;
            }

            .nav-label {
                display: none;
            }

            .sidebar nav {
                display: flex;
                overflow-x: auto;
                gap: 5px;
            }

            .nav-link {
                white-space: nowrap;
            }

            .content {
                padding: 24px 15px;
            }

            .panel {
                padding: 20px 15px;
            }

            h1 {
                font-size: 24px;
            }

            .heading-icon {
                display: none;
            }

            .account-name,
            .account-role {
                display: none;
            }

            .compile-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .compile-footer .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24" width="22" height="22"
                     fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="3" width="18" height="18" rx="4"/>
                    <path d="M8 8h8M8 12h8M8 16h5"/>
                </svg>
            </div>
            <div>
                <div class="brand-name">BHE Golf Events</div>
                <div class="brand-subtitle">Management Workspace</div>
            </div>
        </div>

        <div class="nav-label">WORKSPACE</div>

        <nav>
            <a class="nav-link" href="{{ url('/clients') }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="17" rx="2"/>
                    <path d="M8 4V2M16 4V2M3 10h18"/>
                </svg>
                Company Dashboard
            </a>

            <a class="nav-link" href="{{ url('/transactions') }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="16" rx="2"/>
                    <path d="M7 9h10M7 13h10M7 17h6"/>
                </svg>
                Transactions
            </a>

            <a class="nav-link active" href="{{ route('bir.index') }}">
                <svg viewBox="0 0 24 24">
                    <path d="M7 3h8l5 5v13H7z"/>
                    <path d="M15 3v6h5M10 14h7M10 18h7"/>
                </svg>
                BIR Invoice & Receipts
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <header class="topbar">
            <div class="breadcrumb">
                Workspace / <strong>BIR Invoice & Receipts</strong>
            </div>

            <div class="account">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>

                <div>
                    <div class="account-name">
                        {{ auth()->user()->name ?? 'User' }}
                    </div>
                    <div class="account-role">
                        {{ ucfirst(auth()->user()->role ?? 'Staff') }}
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </header>

        <div class="content">

            <div class="page-heading">
                <div>
                    <div class="eyebrow">DOCUMENT MANAGEMENT</div>
                    <h1>BIR Invoice & Receipts</h1>
                    <p class="subtitle">
                        Upload, organize, and compile your invoices in one place.
                    </p>
                </div>

                <div class="heading-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="4" width="12" height="16" rx="2"/>
                        <path d="M8 9h5M8 13h5M18 8h2v12H9"/>
                    </svg>
                </div>
            </div>

            @if(session('success'))
                <div class="notice notice-success" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="notice notice-error" role="alert">
                    <strong>Please check the following:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- UPLOAD PANEL -->
            <section class="panel">
                <h2 class="panel-title">Upload New Invoice</h2>
                <p class="panel-description">
                    Save an invoice with its invoice number. No client or transaction required.
                </p>

                <form method="POST"
                      action="{{ route('bir.store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="upload-grid">
                        <div>
                            <label class="field-label" for="invoice_number">
                                Invoice Number
                            </label>

                            <input
                                class="text-input"
                                type="text"
                                id="invoice_number"
                                name="invoice_number"
                                placeholder="e.g. INV-2026-001"
                                value="{{ old('invoice_number') }}"
                                maxlength="255"
                                required
                            >
                        </div>

                        <div>
                            <label class="field-label" for="invoice_file">
                                Invoice File
                            </label>

                            <div class="upload-box">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.7"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 16V4m0 0L7 9m5-5l5 5"/>
                                    <path d="M4 16v4h16v-4"/>
                                </svg>

                                <div><strong>Choose your invoice file</strong></div>

                                <input
                                    type="file"
                                    id="invoice_file"
                                    name="invoice_file"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    required
                                >

                                <div class="upload-help">
                                    PDF, JPG or PNG · Maximum 10 MB
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="upload-actions">
                        <button type="submit" class="button">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 16V4m0 0L7 9m5-5l5 5"/>
                                <path d="M4 16v4h16v-4"/>
                            </svg>
                            Save Invoice
                        </button>
                    </div>
                </form>
            </section>

            <!-- INVOICE LIBRARY -->
            <section class="panel">
                <div class="library-header">
                    <div>
                        <h2 class="panel-title">Invoice Library</h2>
                        <p class="panel-description" style="margin-bottom:0">
                            Browse uploaded invoices and select files to compile.
                        </p>
                    </div>

                    <div class="count">
                        {{ $documents->total() }} document(s)
                    </div>
                </div>

                <form method="GET" action="{{ route('bir.index') }}"
                      class="search-form">
                    <input
                        type="search"
                        name="search"
                        class="text-input"
                        placeholder="Search invoice number..."
                        value="{{ request('search') }}"
                        aria-label="Search invoice number"
                    >
                    <button type="submit" class="button button-secondary">
                        Search
                    </button>
                </form>

                <form method="POST" action="{{ route('bir.compile') }}"
                      id="compileForm">
                    @csrf

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width:45px">
                                        <input type="checkbox"
                                               id="selectAll"
                                               aria-label="Select all invoices on this page">
                                    </th>
                                    <th>Invoice</th>
                                    <th>Uploaded</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($documents as $document)
                                    <tr>
                                        <td>
                                            <input
                                                type="checkbox"
                                                class="document-checkbox"
                                                name="documents[]"
                                                value="{{ $document->id }}"
                                                aria-label="Select invoice {{ $document->invoice_number }}"
                                            >
                                        </td>

                                        <td>
                                            <div class="file-cell">
                                                <div class="file-icon">
                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="1.7"
                                                         stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path d="M6 3h8l4 4v14H6z"/>
                                                        <path d="M14 3v5h4M9 13h6M9 17h6"/>
                                                    </svg>
                                                </div>

                                                <div>
                                                    <div class="invoice-number">
                                                        {{ $document->invoice_number }}
                                                    </div>
                                                    <div class="filename">
                                                        {{ $document->original_filename }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="count">
                                            {{ $document->created_at->format('M d, Y') }}
                                        </td>

                                        <td>
                                            <a class="table-link"
                                               href="{{ route('bir.preview', $document) }}"
                                               target="_blank"
                                               rel="noopener noreferrer">
                                                Preview
                                            </a>

                                            <a class="table-link"
                                               href="{{ route('bir.download', $document) }}">
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="empty-state">
                                                No invoices found. Upload your first invoice above.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="compile-footer">
                        <div class="selection-count" id="selectionCount">
                            0 invoices selected
                        </div>

                        <button class="button button-secondary"
                                type="submit"
                                id="compileButton"
                                disabled>
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7 3h8l5 5v13H7z"/>
                                <path d="M15 3v6h5M10 14h7M10 18h7"/>
                            </svg>
                            Compile Selected Invoices
                        </button>
                    </div>
                </form>

                <div class="pagination">
                    {{ $documents->links() }}
                </div>
            </section>

        </div>
    </main>
</div>

<script>
    const selectAll = document.getElementById('selectAll');
    const checkboxes = Array.from(
        document.querySelectorAll('.document-checkbox')
    );
    const compileButton = document.getElementById('compileButton');
    const selectionCount = document.getElementById('selectionCount');
    const compileForm = document.getElementById('compileForm');

    function updateSelection() {
        const selected = checkboxes.filter(box => box.checked).length;

        selectionCount.textContent =
            selected + (selected === 1
                ? ' invoice selected'
                : ' invoices selected');

        compileButton.disabled = selected === 0;

        selectAll.checked =
            checkboxes.length > 0 && selected === checkboxes.length;

        selectAll.indeterminate =
            selected > 0 && selected < checkboxes.length;
    }

    selectAll.addEventListener('change', function () {
        checkboxes.forEach(box => {
            box.checked = selectAll.checked;
        });

        updateSelection();
    });

    checkboxes.forEach(box => {
        box.addEventListener('change', updateSelection);
    });

    compileForm.addEventListener('submit', function (event) {
        const selected = checkboxes.filter(box => box.checked).length;

        if (selected === 0) {
            event.preventDefault();
            alert('Please select at least one invoice.');
        } else if (selected > 50) {
            event.preventDefault();
            alert('You can compile up to 50 invoices at a time.');
        }
    });

    updateSelection();
</script>
</body>
</html>
