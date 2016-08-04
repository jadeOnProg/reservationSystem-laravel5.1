@extends('layouts.master')


@section('content')

@include('layouts.nav')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/requirement">Requirements</a> / Add new requirement
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Requirements</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/requirement" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Requirement Name" name="requirement_name"  autofocus>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Add</button>
                         </fieldset>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

