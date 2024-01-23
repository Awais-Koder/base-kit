<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Isopenrightsidebar Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('isOpenRightSidebar', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('isOpenRightSidebar', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('isOpenRightSidebar', 'Isopenrightsidebar', ['class' => 'form-check-label']) !!}
    </div>
</div>