<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .login-container {
            max-width: 350px;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
            /* Adjust the width of the logo as needed */
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="/logo_bps.png" alt="Logo">
        </div>
        <h2>Login</h2>
        <form action="{{ url('/login') }}" method="post">
            @csrf <!-- CSRF Token -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login-button" type="submit">Login</button>
        </form>

        @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>

</html>