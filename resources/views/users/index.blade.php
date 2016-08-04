@extends('layouts.master')

@section('content')

@include('layouts.nav')
@include('layouts.sidebar')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">Users list</h5>
        </div><!-- /.col-lg-12 -->
    </div>

    @if(session()->has('msg'))

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('msg')  }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    users info
                    <div class="pull-right">
                        <a class="btn btn-xs btn-danger" href="/user/create" ><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->email  }}</td>
                                    <td>{{ $user->lastname  }}</td>
                                    <td>{{ $user->firstname  }}</td>
                                    <td>{{ $user->created_at  }}</td>
                                    <td>{{ $user->updated_at  }}</td>
                                    <td class="center">
                                        <form action="/user/{{ $user->id  }}" method="POST">
                                            {{ csrf_field() }}
                                            {!! method_field('DELETE'); !!}
                                            <a href="/user/{{ $user->id  }}" title="info" class="btn btn-default btn-circle"><i class="fa fa-user"></i></a>
                                            <a href="/user/{{ $user->id  }}/edit"  title="update" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>
                                            <button type="submit" title="delete" class="btn btn-danger btn-circle "><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
