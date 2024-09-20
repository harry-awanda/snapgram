<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Foto</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
  <!-- Menambahkan Boxicons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
  
</head>
<body>
  <div class="container mt-4">
    @yield('content')
  </div>
  
  <!-- Navbar -->
  <nav class="navbar navbar-light">
    <ul class="navbar-nav d-flex flex-row justify-content-around">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class='bx bx-home'></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('albums.index') }}">
          <i class='bx bx-folder'></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('photos.create') }}">
          <i class='bx bx-plus-circle'></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.index') }}">
          <i class='bx bx-user'></i>
        </a>
      </li>
    </ul>
  </nav>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>