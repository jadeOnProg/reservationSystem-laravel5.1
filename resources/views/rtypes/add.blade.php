@extends('layouts.master')


@section('content')

@include('layouts.nav')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/type">Type</a> / Add new type
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add new Reservation Type</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/type" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Ex.. Wedding, Mass, etc." name="type"  autofocus>
                        @if($errors->has('type')) <p class="text-danger help-block">{{ head($errors->get('type')) }}</p> @endif
                            </div>
                            <div class="form-group">
                                <input type="radio" name="is_single" value="0" checked="checked" /><label>single participant</label>
                                <input type="radio" name="is_single" value="1"/><label>multi participants</label>
                        @if($errors->has('is_single')) <p class="text-danger help-block">{{ head($errors->get('is_single')) }}</p> @endif
                            </div>


                            <p class="help-block">Choose Requirements:</p>
                            <ul class="list-inline">
                            @foreach($requirements as $requirement)
                                <li>
                                    <input type="checkbox" class="" name="requirements[]" value="{{ $requirement->id }}">
                                    <span class="text-warning">{{ $requirement->requirement  }}</span>&nbsp;&nbsp;
                                </li>
                            @endforeach
                            </ul>

                            <br/>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Add Reservation Type</button>
                         </fieldset>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

