@extends('admin/layout/index')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @include ('layouts/messages')

            <h1>Menus <a href="{{ url('/admin/menus/create') }}" class="btn btn-primary btn-xs"
                         title="Add New Menu"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
            <div class="table">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th> Name</th>
                        <th> Kitchens</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($menus as $item)
                        {{-- */$x++;/* --}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @foreach($item->kitchens as $kitchen)
                                    <a href="{{url( 'admin/kitchens/' . $kitchen->id) }}"> {{$kitchen->name}}</a>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('/admin/menus/' . $item->id) }}" class="btn btn-success btn-xs"
                                   title="View Menu"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                <a href="{{ url('/admin/menus/' . $item->id . '/edit') }}"
                                   class="btn btn-primary btn-xs" title="Edit Menu"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                <a href="{{ url('/admin/menus/' . $item->id . '/block') }}"
                                   class="btn btn-warning btn-xs" title="Block Menu"><span
                                            class="glyphicon glyphicon-ban-circle" aria-hidden="true"/></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/menus', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Menu" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Menu',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                ))!!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $menus->render() !!} </div>
                <a href="{{ url('/admin/menus/blocked') }}" class="btn btn-success btn-xs" title="View Caterer">
                    Blocked Menus <span class="glyphicon  glyphicon-list-alt" aria-hidden="true"/></a>
            </div>
        </div>
    </div>
@endsection
