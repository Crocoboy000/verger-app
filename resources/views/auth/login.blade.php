<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf
        <label>Login:</label>
        <input type="text" name="login" required><br><br>

        <label>Password:</label>
        <input type="password" name="pwd" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="/register">Register here</a></p>
</body>
</html>
