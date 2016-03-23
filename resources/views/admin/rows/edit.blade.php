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
                                <div class="alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                            {!! Form::model($row, array('route' => array('admin.rows.update', $row->id), 'method' => 'put', 'class' => 'form-horizontal')) !!}

                            @if(is_object($columns))
                                @foreach($columns as $column)
                                    <div class="form-group">
                                        {!! Form::label($column->name, $column->name, array('class' => 'control-label col-sm-2')) !!}
                                        <div class="col-sm-10">
                                            {!! Form::text($column->slug, old($column->slug), array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                @endforeach
                            @endif

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
