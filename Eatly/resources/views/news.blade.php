@include ('blocks.header', ['title' => $title]);

{{-- use Illuminate\Support\Facades\DB; --}}
    
    @foreach($news as $key => $elem)
    <?php 
    $user_name = DB::table('users')->where('id', $elem->user_id)->value('name');
    ?>
    <div class="col-md-6">
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
          <h2>{{$elem->title}}</h2>
          <p>{{$elem->text}}</p>
          <p>Author: {{$user_name}}</p>
          <img src="{{$elem->img}}" alt="#">
          <button class="btn btn-outline-secondary" type="button">Redact</button>
          <button class="btn btn-outline-secondary" type="button">Delete</button>
        </div>
      </div>
    @endforeach


@include ('blocks.footer');