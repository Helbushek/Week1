@include ('blocks.header', ['title' => "News"]);

<div>
    @foreach($news as $key => $elem)
            <h3>{{$elem->user_id}}</h3>
            <p>{{$elem -> title}}</p>
            <p>{{$elem -> text}}</p>
            <p>{{$elem -> img}}</p>
    @endforeach
</div>

@include ('blocks.footer');