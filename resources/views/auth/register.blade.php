<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf
        <label>Login:</label>
        <input type="text" name="login" required><br><br>

        <label>Password:</label>
        <input type="password" name="pwd" required><br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="/login">Login here</a></p>
</body>
</html>
