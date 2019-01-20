<div class="form-group row">
    {!! Form::label('desc1','Opisz co sprzedajesz',['class'=>'col-sm-3 col-form-label'])  !!}
  <div class="col-9">
    {!! Form::text('desc1',null,['class'=>'form-control','placeholder'=>'np. moja sukienka'])  !!}
  </div>
</div>
<div class="form-group row">
    {!! Form::label('desc2','Opisz szczegółowo przedmiot',['class'=>'col-sm-3 col-form-label'])  !!}
  <div class="col-9">
    {!! Form::text('desc2',null,['class'=>'form-control'])  !!}
  </div>
</div>
<div class="form-group">
      {!! Form::label('brand_id','Marka')  !!}
      {!! Form::select('brand_id', $brands,null, ['class' => 'form-control'])  !!}
</div>
<div class="form-group">
      {!! Form::label('condition_id','Stan')  !!}
      {!! Form::select('condition_id', $cond,null, ['class' => 'form-control'])  !!}
</div>
<a href="#" class="btn btn-info btn-custom" data-toggle="modal" data-target="#exampleModalCenter">wybierz kategorię</a>

<!-- Vue komponent -->

{{-- <div class="form-group">
  {!! Form::label('region_id','Województwo')  !!}
  {!! Form::select('region_id', $regions,null, ['class' => 'form-control'])  !!}
</div> --}}
