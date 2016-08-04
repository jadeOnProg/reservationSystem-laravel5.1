@extends('layouts.master')

@section('content')

@include('layouts.nav')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/requirement">Requirement</a> / update requirement
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Requirement</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/requirement/{{ $requirement->id  }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('PUT'); !!}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Type" name="requirement_name" value="{{ $requirement->requirement  }}"  autofocus>
                        @if($errors->has('requirement_name')) <p class="text-danger help-block">{{ head($errors->get('requirement_name')) }}</p> @endif
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Update</button>
                         </fieldset>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

