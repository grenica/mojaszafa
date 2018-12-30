<div class="form-group">
      {!! Form::label('name','Nazwa')  !!}
      {!! Form::text('name',null,['class'=>'form-control'])  !!}
</div>
<div class="form-group">
      {!! Form::label('isActive','Aktywny')  !!}
      {!! Form::checkbox('isActive',true,true,['class'=>'form-control flat-red'])  !!}
</div>
<div class="form-group">
      {!! Form::label('isSize','Jest rozmiar')  !!}
      {!! Form::checkbox('isSize',true,false,['class'=>'form-control flat-red'])  !!}
</div>
<div class="form-group">
      {!! Form::label('isColor','Jest kolor')  !!}
      {!! Form::checkbox('isColor',true,false,['class'=>'form-control flat-red'])  !!}
</div>
