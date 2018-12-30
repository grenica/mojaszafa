@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">
        @include('layouts._leftnav')
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mój profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  {{-- @empty ($address)
                    <p>Ustaw lokalizację</p>
                    <a href="{{ route('settings.address.create')}}" class="btn btn-info">Ustaw moją lokalizację</a>
                  @endempty --}}
                  @isset($user)
                     {{-- jak mam juz jakis wpis w polu desc lub ustawiony image --}}
                      @if (strlen($user->address->desc)>0 || strlen($user->address->image)>0 )
                        {!! Form::model($user->address, ['route' => ['settings.account.update', $user->address->getRouteKey()], 'method' => 'put','files'=>true]) !!}
                      @else
                        {!! Form::open(array('route'=>'settings.account.store','files' => true)) !!}
                      @endif

                      <div class="form-group row">
                      <label for="example-text-input" class="col-2 col-form-label">Twoje zdjęcie</label>
                      <div class="col-10">
                        {{Form::file('image',['class'=>'float-right'])}}
                        {{-- <input class="form-control" type="text" value="Artisanal kale" id="example-text-input"> --}}
                      </div>
                    </div>
                    <div class="form-group row">
                      {!! Form::label('desc','O sobie',['class'=>'col-2 col-form-label'])  !!}
                      <div class="col-10">
                        {!! Form::text('desc',null,['class'=>'form-control'])  !!}
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 text-right">
                        {{ Form::submit('Zaktalizuj profil',['class'=>'btn btn-primary']) }}
                      </div>
                    </div>
                    {!! Form::close() !!}
                  @endisset

                </div>
            </div> <!-- card-->
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="">
                  <h5>E-mail</h5>
                  <p>{{ $user->email }}</p>
                </div>
                <a href="#" class="btn btn-outline-info">zmien</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Zmien hasło
                <a href="#" class="btn btn-outline-info">zmien</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Usun konto
                <a href="#" class="btn btn-outline-info">Usun</a>
              </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('nav')
  @include('nav')
@endsection
