<!DOCTYPE html>
<html>
<head>
    <title>Add Statut</title>
</head>
<body>
    <h2>Add New Statut</h2>

    <form method="POST" action="/statut/add">
        @csrf

        <label>Verger:</label>
        <select name="refver" required>
            @foreach($vergers as $verger)
                <option value="{{ $verger->refver }}">{{ $verger->nomver }} ({{ $verger->refver }})</option>
            @endforeach
        </select><br><br>

        <label>Num Ver:</label>
        <input type="text" name="numver" required><br><br>

        <label>Date Ver:</label>
        <input type="date" name="dtver" required><br><br>

        <label>Code Var:</label>
        <input type="text" name="codvar" required><br><br>

        <label>Nom Var:</label>
        <input type="text" name="nomvar" required><br><br>

        <label>Pd Rec:</label>
        <input type="text" name="pdrec"><br><br>

        <label>Pd Exp:</label>
        <input type="text" name="pdexp"><br><br>

        <label>Pd Eca:</label>
        <input type="text" name="pdeca"><br><br>

        <label>Pd Fre:</label>
        <input type="text" name="pdfre"><br><br>

        <button type="submit">Add Statut</button>
    </form>

    <p><a href="/dashboard">← Back to Dashboard</a></p>
</body>
</html>
