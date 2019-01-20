<ul class="list-group">
  @foreach ($category as $cat)
    <li class="list-group-item list-group-item-action" id="{{$cat->id}}">{{ $cat->name }}</li>
  @endforeach
</ul>
