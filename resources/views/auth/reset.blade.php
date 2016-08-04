@extends('layouts.master')


@section('content')
<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Reset your Password</h3>
                </div>
   @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    @endif

                <div class="panel-body">
<form action="/password/reset" method="POST">
   {{ csrf_field() }}
 
     <fieldset>
         <div class="form-group">
            <input placeholder="Enter your e-mail address" name="email" class="form-control">
        </div>

        <div class="form-group">
            <input placeholder="Enter you new password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <input placeholder="Confirm your password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit"  class="btn btn-lg btn-success btn-block">Reset password</button>


     </fieldset>
</form>

        </div>
             </div>
        </div>
    </div>

@endsection
