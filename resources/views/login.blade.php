<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary d-flex align-items-center" style="min-height: 100vh;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg p-4 rounded-4">
                <h2 class="text-center fw-bold mb-3">🔒 Gerbang Admin</h2>
                
                @if(session('error'))
                    <div class="alert alert-danger small">{{ session('error') }}</div>
                @endif

                @if(session('error_login'))
                    <div class="alert alert-danger small">{{ session('error_login') }}</div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 fw-bold">Masuk Panel 🚀</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>