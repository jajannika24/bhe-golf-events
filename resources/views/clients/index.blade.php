<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BHE Golf Events - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f2fb;
            margin: 0;
            color: #2b2040;
        }

        .header {
            background: linear-gradient(135deg, #24103f, #4c1d95);
            color: white;
            padding: 30px 40px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .brand h1 {
            margin: 0;
            font-size: 28px;
            color: white;
        }

        .brand p {
            margin: 8px 0 0;
            color: #ddd0f6;
            font-size: 14px;
        }

        .account {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .account-name {
            font-weight: bold;
            font-size: 14px;
        }

        .role-badge {
            background: #e9ddff;
            color: #4c1d95;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .logout-button {
            background: transparent;
            color: white;
            border: 1px solid #bda5e8;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
        }

        .logout-button:hover {
            background: #ffffff20;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 28px;
        }

        h2 {
            color: #301451;
            margin: 0 0 10px;
            font-size: 26px;
        }

        .subtitle {
            color: #746782;
            margin: 0;
            font-size: 14px;
        }

        .button {
            display: inline-block;
            background: #5b2ca0;
            color: white;
            padding: 13px 20px;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
        }

        .button:hover {
            background: #432078;
        }

        .search-box {
            margin: 25px 0 15px;
            background: white;
            border: 1px solid #e8def3;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 5px 18px #31134d0a;
        }

        .search-label {
            display: block;
            color: #422166;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .search-input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #d9c9ea;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            color: #2b2040;
        }

        .search-input:focus {
            border-color: #7b4bc1;
            box-shadow: 0 0 0 3px #7b4bc11c;
        }

        .search-info {
            margin-top: 12px;
            color: #746782;
            font-size: 13px;
        }

        .section-heading {
            color: #422166;
            font-size: 17px;
            margin: 32px 0 18px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .company {
            display: block;
            background: white;
            padding: 26px;
            border-radius: 14px;
            border: 1px solid #e8def3;
            text-decoration: none;
            color: #2b2040;
            box-shadow: 0 5px 18px #31134d0a;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .company:hover {
            transform: translateY(-4px);
            border-color: #8b5cc7;
            box-shadow: 0 10px 24px #31134d1c;
        }

        .company[hidden] {
            display: none;
        }

        .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            font-size: 27px;
            background: #f1e8ff;
            border-radius: 13px;
        }

        .name {
            font-size: 19px;
            font-weight: bold;
            margin-top: 18px;
            color: #32164e;
        }

        .contact {
            color: #776c84;
            font-size: 14px;
            margin-top: 10px;
        }

        .hint {
            color: #6531a6;
            margin-top: 24px;
            font-weight: bold;
            font-size: 13px;
        }

        .empty {
            background: white;
            border: 1px dashed #cdb9e6;
            padding: 35px;
            border-radius: 14px;
            color: #746782;
        }

        .footer {
            text-align: center;
            color: #9488a1;
            font-size: 12px;
            padding: 35px 20px;
        }

        @media (max-width: 600px) {
            .header {
                padding: 24px 20px;
            }

            .brand h1 {
                font-size: 23px;
            }

            .container {
                padding: 25px 18px;
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
        <div class="header-top">

            <div class="brand">
                <h1>⛳ BHE Golf Events</h1>
                <p>Transaction & Document Management System</p>
            </div>

            <div class="account">
                <span class="account-name">
                    {{ auth()->user()->name }}
                </span>

                <span class="role-badge">
                    {{ ucfirst(auth()->user()->role ?? 'staff') }}
                </span>

                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf

                    <button type="submit" class="logout-button">
                        Log Out
                    </button>
                </form>
            </div>

        </div>
    </header>

    <main class="container">

        <div class="top">
            <div>
                <h2>Company Dashboard</h2>
                <p class="subtitle">
                    Select a company to manage its transactions and documents.
                </p>
            </div>

            <a href="/clients/create" class="button">
                + Add New Company
            </a>
        </div>

        <!-- Client Search -->
        <div class="search-box">
            <label for="clientSearch" class="search-label">
                🔎 Search Companies
            </label>

            <input
                type="search"
                id="clientSearch"
                class="search-input"
                placeholder="Search by company name or contact person..."
                autocomplete="off"
            >

            <div class="search-info" id="searchInfo" aria-live="polite">
                Showing all companies.
            </div>
        </div>

        <h3 class="section-heading">
            Your Companies
        </h3>

        <div class="grid" id="companyGrid">

            @forelse ($clients as $client)

                <a
                    href="/clients/{{ $client->id }}/transactions"
                    class="company"
                    data-search="{{ strtolower($client->client_name . ' ' . ($client->contact_person ?? '')) }}"
                >
                    <div class="icon">
                        🏢
                    </div>

                    <div class="name">
                        {{ $client->client_name }}
                    </div>

                    <p class="contact">
                        {{ $client->contact_person ?: 'Company Record' }}
                    </p>

                    <div class="hint">
                        View Transactions →
                    </div>
                </a>

            @empty

                <div class="empty">
                    No companies yet. Add your first company!
                </div>

            @endforelse

        </div>

        <div
            class="empty"
            id="noResults"
            style="display: none; margin-top: 20px;"
        >
            No matching clients found. Try another search.
        </div>

    </main>

    <footer class="footer">
        BHE Golf Events · Transaction & Document Management System
    </footer>

    <script>
        const searchInput = document.getElementById('clientSearch');
        const companyCards = document.querySelectorAll('.company');
        const noResults = document.getElementById('noResults');
        const searchInfo = document.getElementById('searchInfo');

        function filterCompanies() {
            const query = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            companyCards.forEach(function (card) {
                const searchableText = card.dataset.search || '';
                const matches = searchableText.includes(query);

                card.hidden = !matches;

                if (matches) {
                    visibleCount++;
                }
            });

            if (companyCards.length > 0 && visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }

            if (query === '') {
                searchInfo.textContent =
                    'Showing all ' + companyCards.length + ' companies.';
            } else {
                searchInfo.textContent =
                    'Found ' + visibleCount + ' matching compan' +
                    (visibleCount === 1 ? 'y.' : 'ies.');
            }
        }

        searchInput.addEventListener('input', filterCompanies);

        filterCompanies();
    </script>

</body>
</html>