
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client | BHE Golf Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            padding: 30px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }
        h1 { color: #245c45; }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #245c45;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Client</h1>

        <form method="POST" action="/clients">
            @csrf

            <label>Client Name *</label>
            <input type="text" name="client_name" required>

            <label>Contact Person</label>
            <input type="text" name="contact_person">

            <label>Email</label>
            <input type="email" name="email">

            <label>Phone</label>
            <input type="text" name="phone">

            <label>Address</label>
            <textarea name="address" rows="3"></textarea>

            <button type="submit">Save Client</button>
        </form>
    </div>
</body>
</html>
