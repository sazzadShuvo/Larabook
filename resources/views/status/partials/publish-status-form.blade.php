<div class="status-post">
    {!! Form::open(['route' => 'status.store']) !!}
    <div class="form-group">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'What\'s on your ming']) !!}
    </div>
    <div class="form-group status-post-submit">
        {!! Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) !!}
    </div>
    {!! Form::close() !!}
</div>