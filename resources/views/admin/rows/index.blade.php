@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Rows</div>
                    <div class="panel-body">
                        <a href="{{ route('admin.rows.create') }}" class="btn btn-success">Create Rows</a>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @if(is_object($columns))
                                        @foreach($columns as $column)
                                            <th>{{ $column->name }}</th>
                                        @endforeach
                                    @endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse($rows->toArray() as $row)
                                <tr>
                                    <td class="text-center">{{ $row['id'] }}</td>
                                    @foreach($columns as $column)
                                        <th>{{ isset($row[$column->slug]) ? $row[$column->slug] : '' }}</th>
                                    @endforeach
                                    <td class="text-center">
                                        {!! Form::open(['route' => ['admin.rows.destroy', $row['id']], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
                                        <a href="{{ route('admin.rows.edit',  $row['id']) }}" class="btn btn-info btn-sm" >
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="javascript:;" onclick="$(this).parent().submit()"  class="btn btn-danger btn-sm" ">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">{{ @trans('admin/variables/industries.empty') }}</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
