@extends('layouts.appadmin')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{ $category->name }}
        </div>
        <div class="card-body">
          <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">dodaj podkategorię</a>
          <table id="mytable" class="display table table-bordered table-hover dataTable">
            <tr>
              <th>ID</th>
              <th>Nazwa</th>
              <th>Opcje</th>
            </tr>
            @foreach ($category->children as $cat)
              <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->primary_id }}</td>
                <td>
                  <div class="float-right">
                      <a href="{{route('admin.categories.show',$cat->id) }}" role="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-info" aria-hidden="true"></i></a>
                    <a href="{{route('admin.categories.edit',$cat->id) }}" role="button" class="btn btn-outline-success btn-sm "><i class="fas fa-edit"></i></a>
                    {!! Form::model($cat,array('route'=>['admin.categories.destroy',$cat->id],'method'=>'DELETE','class'=>'d-inline')) !!}
                                     {!! Form::button('<i class="fas fa-trash-alt" aria-hidden="false"></i>',['type'=>'submit','class'=>'btn btn-sm btn-outline-dark'])  !!}
                                    {!! Form::close() !!}

                  </div>
                </td>
              </tr>
            @endforeach
          </table>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <p><a data-toggle="collapse" href="#mycollapse" role="button" class="btn btn-primary">Przypisane cechy</a></p>
      <div class="collapse" id="mycollapse">
          <div class="card card-body">
            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="colours-tab" data-toggle="pill" href="#colours" role="tab" aria-controls="pills-home" aria-selected="true">Kolory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
          </li> --}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="colours" role="tabpanel" aria-labelledby="colours-tab">
            @if ($category->colours->isEmpty())
              {{-- <p>pusty</p> --}}
              {!! Form::open(array('route'=>'admin.cat_color.store')) !!}
            @else
              {{-- <p>sa przypisane kolory</p> --}}
              {!! Form::model($category, ['route' => ['admin.cat_color.update', $category->getRouteKey()], 'method' => 'put']) !!}
            @endif

              @foreach ($colours as $color)
                <div class="form-check form-check-inline">
                  {!! Form::hidden('catID',$category->id) !!}
                  {!! Form::label('color',$color->name)  !!}
                  {!! Form::checkbox('color[]',$color->id,null,['class'=>'form-control flat-red'])  !!}
                {{-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$color->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{ $color->name }}</label> --}}
              </div>
              @endforeach

            {{ Form::submit('Zapisz',['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Tu coś innego</div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
        </div>
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
      {!! Form::open(array('route'=>'admin.categories.addsub')) !!}
      <div class="modal-body">
        <div class="form-group">
              {{-- {!! Form::label('parent_id','Jest kolor')  !!} --}}
              {!! Form::hidden('parent_id',$category->id,['class'=>'form-control flat-red'])  !!}
        </div>

                        @include('admin.category.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="submit" class="btn btn-primary">Zapisz</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
