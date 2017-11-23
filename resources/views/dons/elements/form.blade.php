<div class="form-group">
    {{ Form::label('shop_id', '店舗一覧') }}
    {{ Form::select('shop_id', $shops, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('don_id', 'どん一覧') }}
    {{ Form::select('don_id', $dons, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('single-word', '一言') }}
    {{ Form::textarea('single_word', null, ['class' => 'form-control', 'id' => 'single-word', 'placeholder' => '一言を入力して下さい。']) }}
</div>

{{ Form::submit($submitButtonName, ['class' => 'btn btn-default']) }}
