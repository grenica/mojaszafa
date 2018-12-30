@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('nav')
@empty ($category)
  <p>No categories</p>
@endempty
  @include('nav')
  {{-- @foreach ($category as $cat)
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
@endforeach --}}
@endsection
