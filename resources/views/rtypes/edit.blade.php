@extends('layouts.master')

@section('content')

@include('layouts.nav')
@include('layouts.sidebar')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="page-header">
            <a href="/type">Type</a> / update type
            </h5>
        </div><!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Reservation Type</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/type/{{ $type->id  }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('PUT'); !!}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Type" name="type" value="{{ $type->type  }}"  autofocus>
                        @if($errors->has('type')) <p class="text-danger help-block">{{ head($errors->get('type')) }}</p> @endif
                            </div>
                             <div class="form-group">
                                <input type="radio" name="is_single" value="0" <?php echo (!$type->participants) ? 'checked="checked" ':''  ?>/><label>single participant</label>
                                <input type="radio" name="is_single" value="1" <?php echo ($type->participants) ? 'checked="checked" ':'' ?> /><label>multi participants</label>
                        @if($errors->has('is_single')) <p class="text-danger help-block">{{ head($errors->get('is_single')) }}</p> @endif
                            </div>

                           <div >
                            @foreach($requirements as $requirement)
<input type="checkbox" class="" name="requirements[]" value="{{ $requirement->id }}" <?php echo (in_array($requirement->id,$reqs))? 'checked':'' ?>>
                                <span class="text-default">{{ $requirement->requirement  }}</span>
                            @endforeach
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

