@include ('blocks.header', ['title' => $title])

<?php use Illuminate\Support\Facades\Auth; ?>
@foreach($users as $key => $elem)
<div class="col-md-6">
    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
      <h2>Name: {{$elem->name}}</h2>
      <p>Email: {{$elem->email}}</p>
      <p>Secreted absolutely totally safe to share hashed password!!!:{{$elem->password}}</p>
      @if(Auth::check() && (Auth::id()==$elem->id || Auth::user()->access_level == true))
      <div class="row sm">
        <div class="col-sm-2 col-8">
      <form method="GET" action="/auth/redact"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-primary" type="submit">Redact</button></form>
        </div>
      <div class="col-sm-2 col-8">
      <form method="GET" action="/auth/delete"><button name="id" value="{{$elem->id}}"  class="btn btn-outline-danger" type="submit">Delete</button><form>
      </div>
      <div class="w-100"></div>
    </div>
        @endif
    </div>
  </div>
@endforeach

@include ('blocks.footer')