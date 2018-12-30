
  @foreach ($category as $cat)
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     {{ $cat->name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      @foreach ($cat->children as $c)
        <a class="dropdown-item" href="#">{{$c->name }}</a>
      @endforeach
    </div>
    </li>
@endforeach
