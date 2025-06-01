<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Aplikasi Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color:rgb(255, 255, 255);
            border-right: 1px solid #dee2e6;
        }
        .nav-link {
            color: #333;
        }
        .nav-link:hover {
            background-color: #e9ecef;
        }
        .nav-link.active {
            background-color: #e9ecef;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.peminjaman.index') }}">Admin Dashboard</a>
            @auth
            <div class="ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
            @endauth
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar py-3">
                <div class="nav flex-column">
                    <a href="{{ route('admin.peminjaman.index') }}" class="nav-link mb-2 {{ request()->routeIs('admin.peminjaman.*') ? 'active' : '' }}">
                        Peminjaman Ruangan
                    </a>
                    <a href="{{ route('users.index') }}" class="nav-link mb-2 {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        Kelola User
                    </a>
                    <a href="{{ route('gedung.index') }}" class="nav-link mb-2 {{ request()->routeIs('gedung.*') ? 'active' : '' }}">
                        Kelola Gedung
                    </a>
                    <a href="{{ route('ruangan.index') }}" class="nav-link mb-2 {{ request()->routeIs('ruangan.*') ? 'active' : '' }}">
                        Kelola Ruangan
                    </a>
                    <a href="{{ route('admin.feedback.index') }}" class="nav-link mb-2 {{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
                        Lihat Feedback
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 py-3">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 