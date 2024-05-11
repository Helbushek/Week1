@include ('blocks.header', ['title' => $title]);

<?php use Illuminate\Support\Facades\Auth; ?>

@foreach($users as $key => $elem)
<div class="col-md-6">
    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
      <h2>{{$elem->name}}</h2>
      <p>{{$elem->email}}</p>
      <p>{{$elem->password}}</p>
      @if(Auth::check() && Auth::id()==$elem->id)
      <a href="/auth/redact"><button class="btn btn-outline-secondary" type="button">Redact</button></a>
      <a href="/auth/delete"><button class="btn btn-outline-secondary" type="button">Delete</button></a>
      @endif
    </div>
  </div>
@endforeach


@include ('blocks.footer');