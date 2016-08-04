@extends('layouts.master')

@section('content')

@include('layouts.nav')

<?php $user = Auth::user();  ?>

@if($user->role == 1)

    @include('layouts.sidebar')
@else
</nav>

@endif

<div id="page-wrapper" style="<?php echo ($user->role == 0) ? 'margin: 0 0 0 0 !important;':'' ?>">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/user/{{ $user_id  }}">user info</a> / Add reservation for user
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">reservation Forms</h3>
                </div>
                <div class="panel-body">
                        <fieldset>
                            <?php $count = 1; ?>
                            <ul class="nav nav-tabs">
                                @foreach($types as $type)
                                    <li class="<?php echo ($count==1)?'active':'' ?>"><a href="#v-{{$type->id}}" data-toggle="tab">{{ $type->type  }}</a></li>
                                    <?php $count++; ?>
                                @endforeach
                            </ul>

                            <?php $count = 1; ?>
                            <div class="tab-content">
                                @foreach($types as $type)
                                <div class="tab-pane fade in <?php echo ($count==1)?'active':'' ?>" id="v-{{ $type->id }}">
                                <form role="form" action="/reservation" method="POST">
                                {{ csrf_field() }}
                                    <h4>{{ $type->type  }} Requirements:</h4>

                                        <?php
                                            if( $type->requirement_ids ) $reqs = DB::select("select * from requirements where id in ($type->requirement_ids) ");
                                            if($type->requirement_ids){?>
                                                <ul><?php
                                                foreach($reqs as $req){
                                                  echo '<li>'.$req->requirement.'</li>';
                                                }?>
                                                </ul><?php
                                            }else{
                                                echo 'N/A';
                                            }
                                        ?>

                                        <select name="schedule" class="form-control">
                                            <option valu="">Select schedule</option>
                                        @foreach($type->schedule as $schedule)
                                            <option value="{{ $schedule->id }}">{{ $schedule->start_time  }} - {{ $schedule->end_time  }} </option>
                                        @endforeach
                                        </select>

                                    <input type="hidden" name="user_id" value="{{ $user_id  }}">
                                    <input type="hidden" name="type" value="{{ $type->id  }}">
                                    <br/>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit"  class="btn btn-lg btn-success btn-block">Submit Reservation</button>

                                    </form>
                                </div>
                                    <?php $count++; ?>
                                @endforeach
                            </div>
                      </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

