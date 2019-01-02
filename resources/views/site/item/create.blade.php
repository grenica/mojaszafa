@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">
        @include('layouts._leftnav')
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(array('route'=>'settings.address.store')) !!}

                    @include('site.address.form')
                      <button type="submit" class="btn btn-primary">Zapisz</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('nav')
  @include('nav')
@endsection
