@include ('blocks.header', ['title'=>"Add news"])
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
    
@if (!Auth::check())
        <?php header("/")?>
@endif

<main class="form-signin w-25 m-auto">
  <form method="GET" action="/news/_add">
    <h1 class="h3 mb-3 fw-normal">Add new record</h1>
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
        <input type="text" class="form-control" id="title" name="title"  placeholder="Full name">
        <label for="title">Title</label>
      </div>
    <div class="form-floating mb-3">
      <textarea type="text" class="form-control" id="text" name="text"  placeholder="name@example.com"></textarea>
      <label for="text">Text</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="img" name="img"  placeholder="Password">
      <label for="img">Image URL</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Add</button>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </div>
@include ('blocks.footer')