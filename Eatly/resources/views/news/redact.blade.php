@include ('blocks.header', ['title'=>"Redact news"])
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
    
@if (!Auth::check())
        <?php header("/")?>
@endif

<?php 
  use Illuminate\Support\Facades\DB;
  $record = DB::table('news')->where('id', $id)->first();
  // print_r($record);
?>

<main class="form-signin w-25 m-auto">
  <form method="GET" action="/news/_redact">
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
        <input type="text" class="form-control" id="title" name="title" value="{{$record->title}}" placeholder="News Title">
        <label for="title">Title</label>
      </div>
    <div class="form-floating mb-3">
      <textarea type="text" class="form-control" id="text" name="text" placeholder="Your text">{{$record->text}}</textarea>
      <label for="text">Text</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="img" name="img"  value="{{$record->img}}" placeholder="Image URL">
      <label for="img">Image URL</label>
    </div>

    <button class="btn btn-primary w-100 py-2" name="id" value="{{$id}}" type="submit">Redact</button>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </div>
@include ('blocks.footer')