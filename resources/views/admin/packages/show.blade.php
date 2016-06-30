@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Package {{ $package->id }}
        <a href="{{ url('admin/packages/' . $package->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Package"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/packages', $package->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Package',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $package->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $package->name }} </td></tr><tr><th> Caterer Id </th><td> {{ $package->caterer_id }} </td></tr><tr><th> Deleted At </th><td> {{ $package->deleted_at }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
