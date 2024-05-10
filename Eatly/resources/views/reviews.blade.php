@include ('blocks.header', ['title' => "Reviews"]);

<div>
    @foreach($review as $key => $elem)
            <h3>{{$elem->user_id}}</h3>
            <p>{{$elem -> text}}</p>
            <p>{{$elem -> rating}}</p>
    @endforeach
</div>

@include ('blocks.footer');