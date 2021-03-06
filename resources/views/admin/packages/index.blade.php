@extends('admin/layout/index')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
           @include ('layouts/messages')
            <h1>Packages <a href="{{ url('/admin/packages/create') }}" class="btn btn-primary btn-xs"
                            title="Add New Package"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
            <div class="table">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th> Name</th>
                        <th>Caterer</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($packages as $item)
                        {{-- */$x++;/* --}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href = "{{ url('admin/caterer',$item->caterer->id) }}">{{$item->caterer->company}}</a></td>
                            <td>
                                <a href="{{ url('/admin/packages/' . $item->id) }}" class="btn btn-success btn-xs"
                                   title="View Package"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                <a href="{{ url('/admin/packages/' . $item->id . '/edit') }}"
                                   class="btn btn-primary btn-xs" title="Edit Package"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                <a href="{{ url('/admin/packages/' . $item->id . '/block') }}"
                                   class="btn btn-warning btn-xs" title="Block Menu"><span
                                            class="glyphicon glyphicon-ban-circle" aria-hidden="true"/></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/packages', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Package" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Package',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                ))!!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $packages->render() !!} </div>
                <a href="{{ url('/admin/packages/blocked') }}" class="btn btn-success btn-xs" title="View Product">
                    Blocked Packages <span class="glyphicon  glyphicon-list-alt" aria-hidden="true"/></a>
            </div>

        </div>
    </div>
@endsection
