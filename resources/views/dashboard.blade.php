<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        th { background-color: #f2f2f2; }
        .pagination { list-style-type: none; padding: 0; margin: 10px 0; }
        .pagination li { display: inline-block; margin-right: 5px; }
        .pagination a { padding: 8px 16px; text-decoration: none; border: 1px solid #ddd; color: black; }
        .pagination a:hover { background-color: #f2f2f2; }
        .pagination .active a { background-color: #ddd; }
    </style>
</head>
<body>
    <h2>Welcome, {{ session('user_login') }}</h2>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <!-- Filter Section -->
    <div style="float: right; width: 300px; padding: 10px; border: 1px solid #ddd;">
        <h3>Filter Statut</h3>

        <form method="GET" action="/dashboard/filter">
            @csrf

            <!-- Filter by Verger Name -->
            <label for="verger_name">Nom Verger:</label>
            <select name="refver" required>
                <option value="">Select Verger</option>
                @foreach($vergersFilter as $verger)
                    <option value="{{ $verger->refver }}" {{ request('refver') == $verger->refver ? 'selected' : '' }}>
                        {{ $verger->nomver }} ({{ $verger->refver }})
                    </option>
                @endforeach
            </select><br><br>


            <label for="date_from">Date From:</label>
            <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}"><br><br>

            <label for="date_to">Date To:</label>
            <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}"><br><br>

            <button type="submit">Filter</button>
        </form>
    </div>

    <h3>Your Verger Status Table</h3>


    @if(request()->hasAny(['refver', 'date_from', 'date_to']) && $statuts->isEmpty())
        <p>No verger filtered or no results match the criteria.</p>
    @elseif($statuts->isEmpty())
        <p>No statut data available.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Ref Verger</th>
                    <th>Num Ver</th>
                    <th>Date Ver</th>
                    <th>Code Var</th>
                    <th>Nom Var</th>
                    <th>Pd Rec</th>
                    <th>Pd Exp</th>
                    <th>Pd Eca</th>
                    <th>Pd Fre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statuts as $statut)
                    <tr>
                        <td>{{ $statut->refver }}</td>
                        <td>{{ $statut->numver }}</td>
                        <td>{{ $statut->dtver }}</td>
                        <td>{{ $statut->codvar }}</td>
                        <td>{{ $statut->nomvar }}</td>
                        <td>{{ $statut->pdrec }}</td>
                        <td>{{ $statut->pdexp }}</td>
                        <td>{{ $statut->pdeca }}</td>
                        <td>{{ $statut->pdfre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p><a href="/verger/add">Add Verger</a> | <a href="/statut/add">Add Statut</a></p>

</body>
</html>
