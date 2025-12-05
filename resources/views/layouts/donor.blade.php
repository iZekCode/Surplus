<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard - Surplus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('donor.dashboard') }}">Surplus Donor</a>
            <div class="ms-auto">
                {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form> --}}
            </div>
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('donor.requests.index') }}">Permintaan Masuk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('donor.profile') }}">Profile</a>
        </li>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>