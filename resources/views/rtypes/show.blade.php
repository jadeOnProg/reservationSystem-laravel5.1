@extends('layouts.master')
<?php $count = 1; ?>

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-yellow">
                <div class="panel-heading"> {{ $type->type  }} </div>
                <div class="panel-body">
                    <h6 class="text-info">Requirements:</h6>

                    @foreach($reqs as $req)
                   {{ $count  }}. {{ $req->requirement }} <br/>
                    <?php $count++; ?>
                    @endforeach

                </div>
                <div class="panel-footer">
                    <form action="/type/{{ $type->id  }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('DELETE'); !!}
                        <a href="/type/{{ $type->id  }}/edit" class="btn btn-outline btn-info">Edit</a>
                        <button type="submit" class="btn btn-outline btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
