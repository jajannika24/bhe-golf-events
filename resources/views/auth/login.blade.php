
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BHE Golf Events</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: #f3f6f3;
            padding: 20px;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.08);
        }

        h1 {
            margin: 0 0 8px;
            color: #24563b;
            font-size: 27px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #24563b;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #19432c;
        }

        .error {
            background: #fff0f0;
            color: #b42318;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>BHE Golf Events</h1>
        <p class="subtitle">Transaction & Document Management System</p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>
