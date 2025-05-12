<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Statut</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #ff6600;
            --primary-light: #ff8533;
            --primary-dark: #cc5200;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #ffcc00;
            --accent: #ffcc00;
            --accent-light: #ffdb4d;
            --accent-dark: #e6b800;
            --info: #90b4ce;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--gray-100);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 1rem;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .header {
            background: var(--primary);
            color: var(--white);
            padding: 2rem;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            padding: 1.5rem 2rem;
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-500);
        }

        .progress-step.active {
            color: var(--primary);
        }

        .progress-step i {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: currentColor;
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--gray-700);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.2s;
            background: var(--gray-50);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        .form-control:disabled {
            background: var(--gray-100);
            cursor: not-allowed;
        }

        .input-group {
            position: relative;
        }

        .input-group .icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--gray-300);
            color: var(--gray-600);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .alert-success {
            background: rgba(76, 201, 240, 0.1);
            border: 1px solid var(--success);
            color: var(--success);
        }

        .alert-danger {
            background: rgba(247, 37, 133, 0.1);
            border: 1px solid var(--danger);
            color: var(--danger);
        }

        .form-hint {
            margin-top: 0.375rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .progress-bar {
                padding: 1rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Add New Statut</h1>
            <p>Complete the form below to add a new verger status</p>
        </div>

        <div class="progress-bar">
            <div class="progress-step active">
                <i class="fas fa-user"></i>
                <span>Basic Info</span>
            </div>
            <div class="progress-step">
                <i class="fas fa-tree"></i>
                <span>Verger Details</span>
            </div>
            <div class="progress-step">
                <i class="fas fa-chart-bar"></i>
                <span>Statistics</span>
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

        <div class="card-body">
            <form method="POST" action="/statut/add" id="statutForm">
                @csrf
                <div class="form-group">
                    <label for="login">Login</label>
                    <div class="input-group">
                        <input type="text" id="login" value="{{ $login }}" readonly disabled class="form-control">
                        <i class="fas fa-lock icon"></i>
                    </div>
                    <input type="hidden" name="login" value="{{ $login }}">
                </div>

                <div class="form-group">
                    <label for="refver">Verger</label>
                    <select id="refver" name="refver" class="form-control" required>
                        <option value="">Select a verger...</option>
                        @foreach($vergers as $verger)
                            <option value="{{ $verger->refver }}">{{ $verger->nomver }} ({{ $verger->refver }})</option>
                        @endforeach
                    </select>
                    <div class="form-hint">Choose the verger you want to add status for</div>
                </div>

                <div class="form-group">
                    <label for="numver">Verger Number</label>
                    <input type="text" id="numver" name="numver" class="form-control" required
                           pattern="[0-9]+" max="8" title="Please enter numbers only">
                </div>

                <div class="form-group">
                    <label for="dtver">Date</label>
                    <input type="date" id="dtver" name="dtver" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="codvar">Variable Code</label>
                    <input type="text" max="8" id="codvar" name="codvar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nomvar">Variable Name</label>
                    <input type="text" id="nomvar" max="8" name="nomvar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pdrec">Received Percentage</label>
                    <input type="number" id="pdrec" name="pdrec" class="form-control"
                           min="0" max="100" step="0.01">
                    <div class="form-hint">Enter a value between 0 and 100</div>
                </div>

                <div class="form-group">
                    <label for="pdexp">Expenditure Percentage</label>
                    <input type="number" id="pdexp" name="pdexp" class="form-control"
                           min="0" max="100" step="0.01">
                </div>

                <div class="form-group">
                    <label for="pdeca">ECA Percentage</label>
                    <input type="number" id="pdeca" name="pdeca" class="form-control"
                           min="0" max="100" step="0.01">
                </div>

                <div class="form-group">
                    <label for="pdfre">Frequency Percentage</label>
                    <input type="number" id="pdfre" name="pdfre" class="form-control"
                           min="0" max="100" step="0.01">
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Save Status
                    </button>
                    <a href="/dashboard" class="btn btn-outline">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('statutForm').addEventListener('submit', function(e) {
            const percentageInputs = ['pdrec', 'pdexp', 'pdeca', 'pdfre'];

            percentageInputs.forEach(id => {
                const input = document.getElementById(id);
                if (input.value) {
                    const value = parseFloat(input.value);
                    if (value < 0 || value > 100) {
                        e.preventDefault();
                        alert(`${input.previousElementSibling.textContent} must be between 0 and 100`);
                    }
                }
            });
        });
    </script>
</body>
</html>
