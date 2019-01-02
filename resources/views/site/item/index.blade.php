@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">
        @include('layouts._leftnav')
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lokalizacja</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  @empty ($address)
                    <p>Ustaw lokalizację</p>
                    <a href="{{ route('settings.address.create')}}" class="btn btn-info">Ustaw moją lokalizację</a>
                  @endempty
                  @isset($address)
                    <p>{{ $address->city }}, {{ $address->region->region }}</p>
                    <a href="{{ route('settings.address.edit',$address->id)}}" class="btn btn-primary"> zmien</a>
                  @endisset


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('nav')
  @include('nav')
@endsection
