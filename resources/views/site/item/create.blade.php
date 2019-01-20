@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{-- <div class="col-md-2">
        @include('layouts._leftnav')
      </div> --}}
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(array('route'=>'items.store')) !!}
                    @include('site.item.form')


                      <button type="submit" class="btn btn-primary">Zapisz</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


</div>


{{-- <div class="mymodal"></div> --}}
@endsection

@section('nav')
  @include('nav')
@endsection

@section('modal')
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Kategoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body mymodal">
        <div class="ajax">ajx</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="submit" class="btn btn-primary">Zapisz</button>
      </div>

    </div>
  </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
// $('.mymodal').on('click','.list-group-item', function() {
//   var v = $(this).attr('id');
//   alert(v);
// });

//$('.list-group .list-group-item').on('click', function() {
$('.mymodal').on('click','.list-group-item', function() {

  //  alert($(this).text());
  var v = $(this).attr('id');
  var a = "{{url('category_ajax2')}}";
  var mojurl =  a.concat('/',v);

  $.ajax({
    type: 'GET',
   url:  mojurl,
    success : function (data) {
              //$(".ajax").html(data);
              $(".modal-body").html(data);
              //alert(mojurl);
            }
  });
});
$('.btn-custom').on('click', function() {
  var a = "{{url('category_modal')}}";
  //var mojurl =  a.concat('/',v);

  $.ajax({
    type: 'GET',
   url:  a,
    success : function (data) {
              $(".mymodal").html(data);
            //alert(a);
            }
  });
});
</script>
@endsection
