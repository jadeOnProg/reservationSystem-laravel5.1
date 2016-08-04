@extends('layouts.master')

@section('content')

@include('layouts.nav')

<?php $user = Auth::user(); ?>
@if($user->role == 1)

    @include('layouts.sidebar')
@else
</nav>

@endif

<div id="page-wrapper" style="<?php echo ($user->role == 0) ? 'margin: 0 0 0 0 !important;':'' ?>">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/user">User</a> / Update user
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update {{ $user->firstname  }}'s info</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/user/{{ $user->id }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('PUT'); !!}
                        <fieldset>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ $user->email }}" autofocus>
                        @if($errors->has('email')) <p class="text-danger help-block">{{ head($errors->get('email')) }}</p> @endif
                                </div>
                                <div class="form-group hide">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="{{ $user->password  }}">
                        @if($errors->has('password')) <p class="text-danger help-block">{{ head($errors->get('password')) }}</span> @endif
                                </div>

                                <div class="form-group">
                                    <label>Contact</label>
                                    <input class="form-control" placeholder="Contact number" name="contact" value="{{ $user->contact }}">
                        @if($errors->has('contact')) <p class="text-danger help-block">{{ head($errors->get('contact')) }}</p> @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input class="form-control" placeholder="Firstname" name="firstname" type="text" value="{{ $user->firstname  }}">
                        @if($errors->has('firstname')) <p class="text-danger help-block">{{ head($errors->get('firstname')) }}</p> @endif
                                </div>
                                <div class="form-group">
                                    <label>Middlename</label>
                                    <input class="form-control" placeholder="Middlename" name="middlename" type="text" value="{{ $user->middlename  }}">
                        @if($errors->has('middlename')) <p class="text-dangeri help-block">{{ head($errors->get('middlename')) }}</p> @endif
                                </div>

                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input class="form-control" placeholder="Lastname" name="lastname" value="{{ $user->lastname  }}">
                        @if($errors->has('lastname')) <p class="text-danger help-block">{{ head($errors->get('lastname')) }}</p> @endif
                                </div>
                            </div>
                                 <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" placeholder="795 Folsom Ave, Suite 600 " name="address" value="{{ $user->address  }}">
                        @if($errors->has('address')) <p class="text-danger help-block">{{ head($errors->get('address')) }}</p> @endif
                                </div>
                         </fieldset>

                        <button type="submit" class="btn btn-lg btn-success btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
