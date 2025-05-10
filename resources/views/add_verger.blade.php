<!DOCTYPE html>
<html>
<head>
    <title>Add Verger</title>
</head>
<body>
    <h2>Add New Verger</h2>

    <form method="POST" action="/verger/add">
        @csrf

        <label>Nom Verger:</label>
        <input type="text" name="nomver" required><br><br>

        <button type="submit">Add Verger</button>
    </form>

    <p><a href="/dashboard">← Back to Dashboard</a></p>
</body>
</html>

