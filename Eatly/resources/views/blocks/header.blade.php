<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php use Illuminate\Support\Facades\Auth; ?>

<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="/user" class="nav-link px-2 text-white">Users</a></li>
          <li><a href="/dishes" class="nav-link px-2 text-white">Dishes</a></li>
          <li><a href="/reviews" class="nav-link px-2 text-white">Reviews</a></li>
          <li><a href="/news" class="nav-link px-2 text-white">News</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
            <a href="/login"> <button type="button" class="btn btn-outline-light me-2">Login</button> </a>
            <a href="/register"> <button type="button" class="btn btn-warning">Sign-up</button> </a>
            @if (Auth::check())
            <a>Your name: <?php echo Auth::user()->name?></a>
            @endif
          </div>
      </div>
    </div>
  </header>