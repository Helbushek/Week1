@include ('blocks.header', ['title'=>"Sign in"])
    <div class="d-flex align-items-center py-4 bg-body-tertiary">

    
<main class="form-signin w-25 m-auto">
  <form>
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    
    <a href="/login/init"> <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button></a>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </div>
@include ('blocks.footer');
