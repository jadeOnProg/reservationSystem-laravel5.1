@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">fill up your email</h3>
                </div>
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    @endif

                <div class="panel-body">
                    <form role="form" action="/password/email" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus />
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit"  class="btn btn-lg btn-success btn-block">Send Password Reset Link</button>
                         </fieldset>
                     </form>
                </div>
             </div>
        </div>
    </div>


@endsection
