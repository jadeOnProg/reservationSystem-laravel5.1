@extends('layouts.master')

@section('content')

@include('layouts.nav')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/schedule">Schedule list</a> / Update schedule
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Church Schedule Type</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/schedule/{{ $schedule->id }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('PUT'); !!}
                        <fieldset>
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="">Select Type of Ceremony</option>
                                    @foreach($type as $v)
                                    <option value="{{ $v->id  }}" <?php echo ($v->id == $schedule->type_id) ? 'selected="selected"':'' ?> >{{ $v->type  }}</option>
                                    @endforeach
                                </select>
                        @if($errors->has('type')) <p class="text-danger help-block">{{ head($errors->get('type')) }}</p> @endif
                            </div>

                             <div class="form-group">
                                <input class="form-control" id="start" value="{{ $schedule->start_time  }}"  placeholder="Select Start DateTime" name="start"  autofocus>
                        @if($errors->has('start')) <p class="text-danger help-block">{{ head($errors->get('start')) }}</p> @endif
                            </div>

                             <div class="form-group">
                                <input class="form-control" id="end"  value="{{ $schedule->start_time  }}" placeholder="Select End DateTime" name="end"  autofocus>
                        @if($errors->has('end')) <p class="text-danger help-block">{{ head($errors->get('end')) }}</p> @endif
                            </div>


                            <br/>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Update Schedule</button>
                         </fieldset>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

