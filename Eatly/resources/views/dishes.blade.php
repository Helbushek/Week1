@include ('blocks.header', ['title' => $title])

@if (Auth::check() && Auth::user()->access_level)
  <a href="/dish/add"><button type="button" class="btn btn-primary margin-left-l">Add Dish</button></a>
@endif

@foreach($dishes as $key => $elem)
<?php 
  $reviews = DB::table('reviews')->where('dish_id', $elem->id)->get();

  $sum = 0;
  $num = 0;
  $avg = 0;
  foreach ($reviews as $key => $value) {
    $sum += $value->rating;
    $num++;
  }
  if ($num>0) {
  $avg = $sum / $num;
  }
?>
    <a href="/dish/{{$elem->id}}" class="text-reset link-underline link-underline-opacity-0"><div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
          <h2>Name: {{$elem->name}}</h2>
          <p>Description: {{$elem->description}}</p>
          <p>Price: {{$elem->price}}</p>
          <p>Rating: {{$avg}}/5</p>
          <img class="w-50 h-50 m-b" src="{{$elem->img}}" alt="#">
        </a>
          @if(Auth::check() && Auth::user()->access_level == true)
      <div class="row sm">
        <div class="col-sm-2 col-8">
      <form method="GET" action="/dish/redact"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-primary" type="submit">Redact</button></form>
        </div>
      <div class="col-sm-2 col-8">
      <form method="GET" action="/dish/delete"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-danger" type="submit">Delete</button></form>
      </div>
      <div class="w-100"></div>
    </div>
        @endif
        </div>
      </div>
@endforeach

@include ('blocks.footer')