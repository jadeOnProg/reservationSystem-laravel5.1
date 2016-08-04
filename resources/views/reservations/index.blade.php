@extends('layouts.master')

@section('content')

@include('layouts.nav')
@include('layouts.sidebar')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">Resevations list</h5>
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
                    Info
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Type of Ceremony</th>
                                    <th>Schedule</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->user->email  }}</td>
                                    <td>{{ $reservation->type->type  }}</td>
                                    <td>{{ $reservation->schedule->start_time  }} <br/> {{ $reservation->schedule->end_time  }}  </td>
                                    <td>{{ $reservation->created_at  }}</td>
                                    <td>{{ $reservation->updated_at  }}</td>
                                    <td class="center">
                                        <form action="/reservation/{{ $reservation->id  }}" method="POST">
                                            {{ csrf_field() }}
                                            {!! method_field('DELETE'); !!}
                                            <a href="/reservation/{{ $reservation->id  }}/edit" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-circle "><i class="fa fa-times"></i></button>
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
