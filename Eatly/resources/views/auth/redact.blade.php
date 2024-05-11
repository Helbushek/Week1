@include ('blocks.header', ['title'=>"Sign up"])
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
    
@if (!Auth::check())
        <?php header("/")?>
@endif

<main class="form-signin w-25 m-auto">
  <form method="GET" action="/auth/_redact">
    <h1 class="h3 mb-3 fw-normal">Redact your data</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="name" value="{{Auth::user()->name}}" placeholder="Full name">
        <label for="name">Full Name</label>
      </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" name="email" value="{{Auth::user()->email}}" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" name="password" value="{{Auth::user()->password}}" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPasswordRepeat" name="password_confirmation" placeholder="PasswordRepeat">
        <label for="floatingPasswordRepeat">Verify your password</label>
      </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Redact</button>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </div>
@include ('blocks.footer')