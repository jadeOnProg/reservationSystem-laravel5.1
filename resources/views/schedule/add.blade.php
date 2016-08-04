@extends('layouts.master')

@section('content')

@include('layouts.nav')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/schedule">Schedule list</a> / Add new schedule
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
                    <form role="form" action="/schedule" method="POST">
                        {{ csrf_field() }}
                        <fieldset>

                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="">Select Type of Ceremony</option>

                                    @foreach($type as $v)
                                        <option value="{{ $v->id  }}">{{ $v->type  }}</option>
                                    @endforeach
                                </select>
                        @if($errors->has('type')) <p class="text-danger help-block">{{ head($errors->get('type')) }}</p> @endif
                            </div>

                             <div class="form-group">
                                <div id="start" class="input-group date">
                                    <input class="form-control"  data-format="yyyy-MM-dd hh:mm:ss"  value="{{ old('start')  }}"  placeholder="Select Start DateTime" name="start"   autofocus>

                                        <span class="add-on input-group-addon">
                                            <i  data-time-icon="glyphicon glyphicon-time" data-date-icon="fa fa-calendar"></i>
                                        </span>
                                </div>
                        @if($errors->has('start')) <p class="text-danger help-block">{{ head($errors->get('start')) }}</p> @endif
                            </div>

                             <div class="form-group">
                                <div id="end" class="input-group date">
                                <input class="form-control"  data-format="yyyy-MM-dd hh:mm:ss"  placeholder="Select End DateTime" name="end" value="{{ old('end')  }}" autofocus>
                                    <span class="add-on input-group-addon">
                                        <i  data-time-icon="glyphicon glyphicon-time" data-date-icon="fa fa-calendar"></i>
                                    </span>
                                </div>


                        @if($errors->has('end')) <p class="text-danger help-block">{{ head($errors->get('end')) }}</p> @endif
                            </div>


                            <br/>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Add Schedule</button>
                         </fieldset>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

