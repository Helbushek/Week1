@include ('blocks.header', ['title'=>"Redact news"])
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
    
@if (!Auth::check())
        <?php header("/")?>
@endif

<?php 
  use Illuminate\Support\Facades\DB;
  $record = DB::table('dishes')->where('id', $id)->first();
?>

<main class="form-signin w-25 m-auto">
  <form method="GET" action="/dish/_redact">
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
    <input type="text" class="form-control" id="name" name="name" required value="{{$record->name}}" placeholder="Full name">
    <label for="title">Title</label>
  </div>
<div class="form-floating mb-3">
  <textarea type="text" class="form-control" id="description" name="description" required placeholder="description">{{$record->description}}</textarea>
  <label for="text">Text</label>
</div>
<div class="form-floating mb-3">
  <input type="number" class="form-control" id="price" name="price" required min="0" max="1000000" value="{{$record->price}}" placeholder="Password">
  <label for="price">Price</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="img" name="img"  required value="{{$record->img}}" placeholder="Password">
  <label for="img">Image URL</label>
</div>

<button class="btn btn-primary w-100 py-2" value="{{$record->id}}" name="id" type="submit">Redact</button>
</form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </div>
@include ('blocks.footer')