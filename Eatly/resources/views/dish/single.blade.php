

<?php 
    use Illuminate\Support\Facades\DB;
    $elem = DB::table('dishes')->where('id', $id)->first();
?>

@include ('blocks.header', ['title' => $elem->name])


  <a href="/dishes"><button type="button" class="btn btn-secondary margin-left-l">Go Back</button></a>
<div class="col-md-6">
    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
          <h2>{{$elem->name}}</h2>
          <p>{{$elem->description}}</p>
          <p>{{$elem->price}}</p>
          <img class="w-50 h-50" src="{{$elem->img}}" alt="#">
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

<form method="GET" action="/review/add"><button name="id" value="{{$id}}" class="btn btn-outline-primary" type="submit" >Add review</button></form>

<?php 
  $records = DB::table('reviews')->where('dish_id', $id)->get();
?>

@foreach($records as $key => $elem)
    <?php $user_name = DB::table('users')->where('id', $elem->user_id)->value('name')?>

    <div class="bg-body-tertiary border col-md-4">
    <h2>{{$elem->rating}}</h2>
    <p>{{$user_name}}<p>
    <p>{{$elem->text}}</p>

    @if(Auth::check() && (Auth::user()->access_level == true || Auth::id() == $elem->id))
      <div class="row sm">
        <div class="col-sm-2 col-8">
      <form method="GET" action="/review/redact"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-primary" type="submit">Redact</button></form>
        </div>
        <div class="col-sm-2 col-8">
      <form method="GET" action="/review/delete"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-danger" type="submit">Delete</button></form>
        </div>
      <div class="w-100"></div>
        </div>
        @endif  

  </div>
@endforeach

@include ('blocks.footer')