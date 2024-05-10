@include ('blocks.header', ['title' => "Dishes"]);

<div>
    @foreach($dishes as $key => $elem)
            <h3>{{$elem->name}}</h3>
            <p>{{$elem -> description}}</p>
            <p>{{$elem -> price}}</p>
            <p>{{$elem -> img}}</p>
    @endforeach
</div>

@include ('blocks.footer');