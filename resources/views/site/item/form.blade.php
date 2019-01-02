<div class="form-group">
      {!! Form::label('city','Nazwa miasta')  !!}
      {!! Form::text('city',null,['class'=>'form-control'])  !!}
</div>
<div class="form-group">
      {!! Form::label('district','Dzielnica')  !!}
      {!! Form::text('district',null,['class'=>'form-control'])  !!}
</div>
<div class="form-group">
  {!! Form::label('region_id','Województwo')  !!}
  {!! Form::select('region_id', $regions,null, ['class' => 'form-control'])  !!}
</div>
