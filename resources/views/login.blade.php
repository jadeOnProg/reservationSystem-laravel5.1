@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/auth/login" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                        @if($errors->has('email')) <p class="text-danger help-block">{{ head($errors->get('email')) }}</p> @endif
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Login</button>
                         </fieldset>
                     </form>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="/password/email" class="help-block">Forgot Pass?</a>
                        </div>
                        <div class="col-md-2 col-md-offset-5">
                            <a href="/register" class="help-block pull-right">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
