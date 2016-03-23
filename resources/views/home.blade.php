@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="users-table table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>id</th>
                                @if(is_object($columns))
                                    @foreach($columns as $column)
                                        <th>{{ $column->name }}</th>
                                    @endforeach
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('.users-table').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                paging: false,
                ajax: '{!! route('get_rows') !!}',
                columns: [
                    {data: 0, name: 'id'},
                    @if(is_object($columns))
                        @foreach($columns as $key => $column)
                    {data: '{!! $key + 1  !!}', name: '{!! $column->slug !!}'},
                        @endforeach
                    @endif
                ]
            });
        });
    </script>
@endsection
