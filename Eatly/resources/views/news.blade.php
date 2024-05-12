@include ('blocks.header', ['title' => $title])

@if (Auth::user()->access_level)
  <a href="/news/add"><button type="button" class="btn btn-primary margin-left-l">Add News</button></a>
@endif
    
    @foreach($news as $key => $elem)
    <?php 
    $user_name = DB::table('users')->where('id', $elem->user_id)->value('name');
    ?>
    <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
          <h2>Title: {{$elem->title}}</h2>
          <p>What happened: {{$elem->text}}</p>
          <p>Author: {{$user_name}}</p>
          <img class="w-50 h-50" src="{{$elem->img}}" alt="#">
          @if(Auth::check() && Auth::user()->access_level == true)
      <div class="row sm">
        <div class="col-sm-2 col-8">
      <form method="GET" action="/news/redact"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-primary" type="submit">Redact</button></form>
        </div>
      <div class="col-sm-2 col-8">
      <form method="GET" action="/news/delete"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-danger" type="submit">Delete</button></form>
      </div>
      <div class="w-100"></div>
    </div>
        @endif
        </div>
      </div>
    @endforeach


@include ('blocks.footer')