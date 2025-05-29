<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email (SSO):</label><br>
        <input type="email" name="username_sso" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        @if ($errors->any())
            <div style="color: red;">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit">Login</button>
    </form>
</body>
</html>
