@extends('layouts.appadmin')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{ $category->name }}
        </div>
        <div class="card-body">
          {!! Form::model($category, ['route' => ['admin.categories.update', $category->getRouteKey()], 'method' => 'put','files'=>true]) !!}
              @include('admin.category.form')

              <div class="form-group">
                  {!! Form::button('Zapisz',['type'=>'submit','class'=>'btn btn-primary'])  !!}
              </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>



@endsection

@section('modal')
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(array('route'=>'admin.size.store')) !!}
      <div class="modal-body">
                        @include('admin.size.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
