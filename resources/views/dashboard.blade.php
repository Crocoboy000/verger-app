<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Verger Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #ff6600;
            --primary-light: #ff8533;
            --primary-dark: #cc5200;
            --accent: #ffcc00;
            --accent-light: #ffdb4d;
            --accent-dark: #e6b800;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            --success: #28a745;
            --success-light: #d4edda;
            --danger: #dc3545;
            --danger-light: #f8d7da;
            --info: #17a2b8;
            --info-light: #d1ecf1;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.2s ease-in-out;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--gray-100);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 15px 25px;
            border-bottom: 2px solid var(--accent);
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo-area {
            display: flex;
            align-items: center;
        }

        .logo-area h2 {
            color: var(--primary);
            margin-right: 15px;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .user-area span {
            font-weight: 500;
            color: var(--gray-700);
        }

        /* Button Styles */
        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            font-size: 0.9rem;
        }

        .btn i {
            font-size: 0.9rem;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-secondary {
            background-color: var(--accent);
            color: var(--gray-800);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background-color: var(--accent-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            border: 1px solid var(--gray-400);
            background-color: transparent;
            color: var(--gray-700);
        }

        .btn-outline:hover {
            background-color: var(--gray-200);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        .btn-danger {
            background-color: var(--danger);
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .btn-danger:hover {
            background-color: #bd2130;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        /* Alert Styles */
        .alert {
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: var(--success-light);
            color: #155724;
            border-color: var(--success);
        }

        .alert-danger {
            background-color: var(--danger-light);
            color: #721c24;
            border-color: var(--danger);
        }

        /* Card Styles */
        .card {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background-color: var(--accent);
            color: var(--gray-800);
            padding: 15px 20px;
            font-weight: 600;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 20px;
        }

        .filter-card {
            position: sticky;
            top: 20px;
        }

        /* Grid Layout */
        .grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--gray-700);
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            font-size: 14px;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.15);
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            background-color: var(--white);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--white);
            min-width: 800px;
        }

        th {
            background-color: var(--primary);
            color: var(--white);
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
            position: sticky;
            top: 0;
            white-space: nowrap;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--gray-200);
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: rgba(255, 204, 0, 0.1);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Enhanced Table Value Styles */
        .numeric-cell {
            font-family: 'Courier New', monospace;
            text-align: right;
            font-weight: 500;
        }

        .positive-value {
            color: var(--success);
        }

        .negative-value {
            color: var(--danger);
        }

        .neutral-value {
            color: var(--gray-600);
        }

        .highlight-cell {
            background-color: rgba(255, 204, 0, 0.2);
            font-weight: 600;
        }

        /* Action Links */
        .action-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .action-links a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .action-links a.delete {
            color: var(--danger);
        }

        .action-links a.delete:hover {
            color: #bd2130;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-admin {
            background-color: var(--primary);
            color: white;
        }

        .badge-user {
            background-color: var(--accent);
            color: var(--gray-800);
        }

        /* Pagination */
        .pagination {
            display: flex;
            list-style-type: none;
            margin: 20px 0;
            gap: 5px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .pagination a {
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid var(--gray-300);
            color: var(--gray-700);
            border-radius: 6px;
            transition: var(--transition);
        }

        .pagination a:hover {
            background-color: var(--accent-light);
            color: var(--gray-800);
            border-color: var(--accent-light);
        }

        .pagination .active a {
            background-color: var(--accent);
            color: var(--gray-800);
            border-color: var(--accent);
            font-weight: 600;
        }

        /* Action Bar */
        .actions-bar {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* Text Utilities */
        .text-center {
            text-align: center;
        }

        /* Empty State */
        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: var(--gray-600);
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
        }

        .empty-state p {
            margin-bottom: 15px;
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--gray-400);
            margin-bottom: 15px;
        }

        /* Section Heading */
        .section-heading {
            color: var(--gray-700);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent);
            font-size: 1.3rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-heading i {
            color: var(--primary);
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--primary);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsive Breakpoints */
        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .container {
                max-width: 1600px;
            }

            .grid {
                grid-template-columns: 1fr 400px;
            }
        }

        /* Large devices (desktops, 992px to 1199px) */
        @media (min-width: 992px) and (max-width: 1199px) {
            .container {
                max-width: 1200px;
            }

            .grid {
                grid-template-columns: 1fr 350px;
            }
        }

        /* Medium devices (tablets, 768px to 991px) */
        @media (min-width: 768px) and (max-width: 991px) {
            .container {
                max-width: 100%;
                padding: 15px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .header {
                padding: 12px 15px;
            }

            th, td {
                padding: 10px 12px;
                font-size: 0.9rem;
            }

            .filter-card {
                position: static;
            }

            .sidebar {
                order: -1;
                margin-bottom: 20px;
            }
        }

        /* Small devices (landscape phones, 576px to 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .container {
                padding: 15px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                padding: 15px;
            }

            .user-area {
                width: 100%;
                justify-content: space-between;
            }

            .filter-card {
                position: static;
            }

            .actions-bar {
                gap: 8px;
                justify-content: center;
            }

            .sidebar {
                order: -1;
            }

            th, td {
                padding: 8px 10px;
                font-size: 0.85rem;
            }

            .card-header {
                padding: 12px 15px;
            }

            .card-body {
                padding: 15px;
            }
        }

        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575px) {
            .container {
                padding: 10px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
                padding: 12px;
            }

            .logo-area h2 {
                font-size: 1.2rem;
            }

            .user-area {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .user-area form {
                width: 100%;
            }

            .user-area .btn {
                width: 100%;
            }

            .card-header {
                padding: 12px 15px;
            }

            .card-body {
                padding: 15px;
            }

            .actions-bar {
                flex-direction: column;
                gap: 8px;
            }

            .actions-bar .btn {
                width: 100%;
            }

            .form-control {
                padding: 8px 10px;
            }

            .sidebar {
                order: -1;
            }

            th, td {
                padding: 8px;
                font-size: 0.8rem;
            }

            .section-heading {
                font-size: 1.1rem;
            }
        }

        /* Table responsive improvements */
        @media (max-width: 991px) {
            .table-responsive-card {
                display: block;
            }

            .table-responsive-card table {
                min-width: unset;
            }

            .table-responsive-card thead {
                display: none;
            }

            .table-responsive-card tbody,
            .table-responsive-card tr,
            .table-responsive-card td {
                display: block;
                width: 100%;
            }

            .table-responsive-card tr {
                margin-bottom: 15px;
                border: 1px solid var(--gray-300);
                border-radius: 8px;
                overflow: hidden;
            }

            .table-responsive-card td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: right;
                padding: 10px 15px;
            }

            .table-responsive-card td::before {
                content: attr(data-label);
                font-weight: 600;
                text-align: left;
                color: var(--gray-700);
            }

            .table-responsive-card .numeric-cell {
                text-align: right;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-area">
                <h2><i class="fas fa-leaf"></i> Verger Management System</h2>
            </div>
            <div class="user-area">
                <span><i class="fas fa-user-circle"></i> Welcome, {{ session('user_login') }}</span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-outline"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('user_role') === 0)
            <div class="grid">
                <div class="main-content">
                    <h3 class="section-heading"><i class="fas fa-chart-line"></i> Verger Status Data</h3>

                    <div class="table-container">
                        @if(request()->hasAny(['refver', 'date_from', 'date_to']) && $statuts->isEmpty())
                            <div class="empty-state">
                                <i class="fas fa-filter"></i>
                                <p>No verger data matches your filter criteria.</p>
                                <a href="/dashboard" class="btn btn-secondary"><i class="fas fa-times"></i> Clear Filters</a>
                            </div>
                        @elseif($statuts->isEmpty())
                            <div class="empty-state">
                                <i class="fas fa-database"></i>
                                <p>No statut data available.</p>
                            </div>
                        @else
                            <div class="table-responsive-card">
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
                                                <td data-label="Ref Verger">{{ $statut->refver }}</td>
                                                <td data-label="Num Ver">{{ $statut->numver }}</td>
                                                <td data-label="Date Ver">{{ $statut->dtver }}</td>
                                                <td data-label="Code Var">{{ $statut->codvar }}</td>
                                                <td data-label="Nom Var">{{ $statut->nomvar }}</td>
                                                <td data-label="Pd Rec" class="numeric-cell {{ $statut->pdrec > 0 ? 'positive-value' : 'neutral-value' }}">{{$statut->pdrec}}</td>
                                                <td data-label="Pd Exp" class="numeric-cell {{ $statut->pdexp > 0 ? 'positive-value' : 'neutral-value' }}">{{$statut->pdexp}}</td>
                                                <td data-label="Pd Eca" class="numeric-cell {{ $statut->pdeca > 0 ? 'negative-value' : 'neutral-value' }}">{{ $statut->pdeca }}</td>
                                                <td data-label="Pd Fre" class="numeric-cell {{ $statut->pdfre > 0 ? 'negative-value' : 'neutral-value' }}">{{ $statut->pdfre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="sidebar">
                    <div class="card filter-card">
                        <div class="card-header">
                            <span><i class="fas fa-filter"></i> Filter Statut</span>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="/dashboard/filter">
                                @csrf
                                <div class="form-group">
                                    <label for="verger_name">Nom Verger:</label>
                                    <select name="refver" id="verger_name" class="form-control" required>
                                        <option value="">Select Verger</option>
                                        @foreach($vergersFilter as $verger)
                                            <option value="{{ $verger->refver }}" {{ request('refver') == $verger->refver ? 'selected' : '' }}>
                                                {{ $verger->nomver }} ({{ $verger->refver }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_from">Date From:</label>
                                    <input type="date" id="date_from" name="date_from" class="form-control" value="{{ request('date_from') }}">
                                </div>
                                <div class="form-group">
                                    <label for="date_to">Date To:</label>
                                    <input type="date" id="date_to" name="date_to" class="form-control" value="{{ request('date_to') }}">
                                </div>
                                <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-search"></i> Apply Filters</button>
                                @if(request()->hasAny(['refver', 'date_from', 'date_to']))
                                    <a href="/dashboard" class="btn btn-outline" style="width: 100%; margin-top: 10px;"><i class="fas fa-undo"></i> Reset Filters</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('user_role') === 1)
            <div class="card">
                <div class="card-header">
                    <span><i class="fas fa-users-cog"></i> User Management</span>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <div class="table-responsive-card">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td data-label="Login">{{ $user->login }}</td>
                                            <td data-label="Role">
                                                <span class="badge {{ $user->role === 1 ? 'badge-admin' : 'badge-user' }}">
                                                    {{ $user->role === 1 ? 'Admin' : 'User' }}
                                                </span>
                                            </td>
                                            <td data-label="Password">••••••••</td>
                                            <td data-label="Actions">
                                                <div class="action-links">
                                                    <a href="{{route('statut',['login'=>$user->login])}}" class="btn btn-secondary btn-sm"><i class="fas fa-plus-circle"></i> Add Status</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="actions-bar">
                        <a href="/register" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register New User</a>
                        <a href="/verger/add" class="btn btn-secondary"><i class="fas fa-tree"></i> Add Verger</a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        // Add responsive behavior for tables on mobile
        document.addEventListener('DOMContentLoaded', function() {
            // Add any additional JavaScript for enhanced responsiveness here
        });
    </script>
</body>
</html>
