@include ('blocks.header', ['title' => $title]);

<div>
    @foreach($users as $elem)
            <h3>{{$elem['name']}}</h3>
            <p>{{$elem['email']}}</p>
            <p>{{$elem['password']}}</p>
    @endforeach
</div>

@include ('blocks.footer');