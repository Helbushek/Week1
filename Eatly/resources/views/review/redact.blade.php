@include ('blocks.header', ['title'=>"Redact review"])
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
    
@if (!Auth::check())
        <?php header("/")?>
@endif

<?php 
  use Illuminate\Support\Facades\DB;
  $record = DB::table('reviews')->where('id', $id)->first();
?>

<main class="form-signin w-25 m-auto">
  <form method="GET" action="/review/_redact">
    <h1 class="h3 mb-3 fw-normal">Redact</h1>
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
        <input type="text" class="form-control" id="text" required name="text" value={{$record->text}} placeholder="Review">
        <label for="title">Review</label>
      </div>
  <div>
    <p>Rating: (0-5)</p>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="rating" name="rating" value="0" placeholder="description">
      <label for="text">0</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="rating" name="rating" value="1" placeholder="description">
      <label for="text">1</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="rating" name="rating" value="2" placeholder="description">
      <label for="text">2</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="rating" name="rating" value="3" placeholder="description">
      <label for="text">3</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="rating" name="rating" value="4" placeholder="description">
      <label for="text">4</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="rating" name="rating" value="5" placeholder="description">
      <label for="text">5</label>
    </div>

  </div>

    <button class="btn btn-primary w-100 py-2" name="id" value="{{$id}}" type="submit">Redact</button>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </div>
@include ('blocks.footer')