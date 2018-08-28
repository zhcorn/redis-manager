@extends('laravel-admin-redis-manager::layout')

@section('page')

    <div class="card card-primary card-outline">
        <div class="card-header with-border">
            <h3 class="card-title">Edit</h3> <small></small>
        </div>


        <form class="form-horizontal" method="post" action="{{ route('redis-store-key') }}" pjax-container>

            <div class="card-body">

                <div class="form-group">
                    <label for="inputKey" class="col-sm-2 control-label">Key</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputKey" placeholder="key" name="key">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExpire" class="col-sm-2 control-label">Expires</label>

                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="ttl" id="inputExpire"  value="-1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Field</label>

                    <div class="col-sm-10">
                        <input class="form-control" name="field">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Value</label>

                    <div class="col-sm-10">
                        <input class="form-control" name="value">
                    </div>
                </div>

                {{ csrf_field() }}
                <input type="hidden" name="conn" value="{{ $conn }}">
                <input type="hidden" name="type" value="hash">
            </div>

            <div class="card-footer">
                <button type="reset" class="btn btn-default pull-right">Reset</button>
                <button class="btn btn-info col-sm-offset-2">Submit</button>
            </div>

        </form>

    </div>
    <!-- /.card-body -->

@endsection