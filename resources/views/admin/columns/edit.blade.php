@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Columns</div>

                    <div class="panel-body">
                        @if($errors->has())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                            {!! Form::model($column, array('route' => array('admin.columns.update', $column->id), 'method' => 'put', 'class' => 'form-horizontal')) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name', array('class' => 'control-label col-sm-2')) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', old('name'), array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type', array('class' => 'control-label col-sm-2')) !!}
                            <div class="col-sm-10">
                                {!! Form::select('type',array('integer' => 'Integer', 'string' => 'String'), old('type'), array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('order', 'Order', array('class' => 'control-label col-sm-2')) !!}
                            <div class="col-sm-10">
                                {!! Form::text('order', old('order'), array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
