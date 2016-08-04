@extends('layouts.master')

@section('content')

@include('layouts.nav')


@if(Auth::user()->role == 1)

    @include('layouts.sidebar')
@else
</nav>

@endif

<div id="page-wrapper" style="<?php echo (Auth::user()->role == 0) ? 'margin: 0 0 0 0 !important;':'' ?>">

    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
                 User info
            </h5>
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
        <div class="col-lg-12 ">
            <address>
                <strong>{{ $user->lastname  }}, {{ $user->firstname }}</strong>
                <br> {{ $user->address  }}
                <br> {{ $user->email  }}
                <br>
                <abbr title="Phone">Contact:</abbr>(+63) {{  $user->contact  }}
            </address>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->lastname  }}'s  reservations records
                    <div class="pull-right">
                        <a class="btn btn-xs btn-danger" href="/reservation/create/{{ $user->id  }}" ><i class="fa fa-plus"></i></a>
                    </div>

               </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
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


  @if(isset($types))
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Schedule Availability
                </div>
                <div class="panel-body">

                  @foreach($types as $type)
                    <?php $isMulti = ($type->participants == 1 ) ? true : false; ?>
                    <h4>{{ $type->type  }}</h4>
                    <ul>
                      @foreach($type->schedule as $schedule)
                          <?php  $isReserved = DB::select("select schedule_id from reservations where schedule_id = $schedule->id "); ?>

                          <?php
                            if($isMulti || !$isReserved){
                              $msg = 'Available';
                              $cls = 'success';
                            }else{
                              $msg = 'Not Available';
                              $cls = 'danger';
                            }
                          ?>

                        <li>{{ $schedule->start_time  }}    <b>-</b> <span class="text-{{ $cls  }}"> {{ $msg  }} </span> </li>
                      @endforeach
                    </ul>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
  @endif

    </div>

</div>

@endsection
