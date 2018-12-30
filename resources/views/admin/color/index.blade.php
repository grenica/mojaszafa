@extends('layouts.appadmin')

@section('content')

  @if (session('success'))
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-info"></i> Alert!</h5>
        {{ session('success')}}
      </div>
    @endif


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <a href="{{route('admin.size.create')}}" class='btn btn-success rounded-circle float-right'><i class="fas fa-plus"></i></a> --}}

          <!-- Button trigger modal -->
<button type="button" class="btn btn-success rounded-circle" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fas fa-plus"></i>
</button>

        </div>
        <div class="card-body">

          <table id="mytable" class="display table table-bordered table-hover dataTable">
            <tr>
              <th>ID</th>
              <th>Nazwa</th>
              <th>Code</th>
              <th>Opcje</th>
            </tr>
            @foreach ($colour as $col)
              <tr>
                <td>{{ $col->id }}</td>
                <td>{{ $col->name }}</td>
                <td> <p style="background-color:{{$col->code}};width:50px;height:14px;"></p></td>
                <td>
                  <div class="float-right">
                    <a href="{{route('admin.color.edit',$col->id) }}" role="button" class="btn btn-outline-success btn-sm "><i class="fas fa-edit"></i></a>
                    {!! Form::model($col,array('route'=>['admin.color.destroy',$col->id],'method'=>'DELETE','class'=>'d-inline')) !!}
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
      {!! Form::open(array('route'=>'admin.color.store')) !!}
      <div class="modal-body">
                        @include('admin.color.form')
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

@section('script')
  <!-- bootstrap color picker -->
<script type="text/javascript">
$(document).ready(function(){
    $(".my-colorpicker").colorpicker()
});
</script>
@endsection
