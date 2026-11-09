<!DOCTYPE html>
<html>
<head>
    <title>BHE Golf Events - Clients</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f4; padding: 35px; }
        h1 { color: #2e7d32; }
        .button { display: inline-block; background: #2e7d32; color: white; padding: 12px 18px; text-decoration: none; border-radius: 6px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 14px; border: 1px solid #ddd; text-align: left; }
        th { background: #dceee0; }
    </style>
</head>
<body>
    <h1>BHE Golf Events</h1>
    <h2>Clients</h2>
    <p>Manage your client records here.</p>

    <a href="/clients/create" class="button">+ Add New Client</a>

    <table>
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->client_name }}</td>
                    <td>{{ $client->contact_person }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No clients yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
