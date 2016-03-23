@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Columns</div>
                    <div class="panel-body">
                        <a href="{{ route('admin.columns.create') }}" class="btn btn-success">Create Columns</a>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse($columns as $column)
                                <tr>
                                    <td class="text-center">{{ $column->id }}</td>
                                    <td>{{ $column->name }}</td>
                                    <td>{{ $column->type }}</td>
                                    <td>{{ $column->order }}</td>
                                    <td class="text-center">
                                        {!! Form::open(['route' => ['admin.columns.destroy', $column->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
                                        <a href="{{ route('admin.columns.edit',  $column->id) }}" class="btn btn-info btn-sm" >
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
