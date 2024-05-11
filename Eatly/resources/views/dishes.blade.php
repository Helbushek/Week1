@include ('blocks.header', ['title' => $title]);

    @foreach($dishes as $key => $elem)
    <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
          <h2>{{$elem->name}}</h2>
          <p>{{$elem->description}}</p>
          <p>Price: {{$price}}</p>
          <img src="{{$elem->img}}" alt="#">
          <button class="btn btn-outline-secondary" type="button">Redact</button>
          <button class="btn btn-outline-secondary" type="button">Delete</button>
        </div>
      </div>
    @endforeach


@include ('blocks.footer');