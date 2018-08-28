@extends('laravel-admin-redis-manager::layout')

@section('page')

<div class="card card-primary card-outline">
    <div class="card-header with-border">
        <h3 class="card-title">Edit</h3> <small></small>
    </div>

    <form class="form-horizontal" method="post" action="{{ route('redis-update-key') }}" pjax-container>
        <div class="card-body">
            <div class="form-group">
                <label for="inputKey" class="col-sm-2 control-label">Key</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control key" name="key" id="inputKey" placeholder="key" readonly value="{{ $data['key'] or '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputValue" class="col-sm-2 control-label">Value</label>

                <div class="col-sm-10">
                    <textarea class="form-control value" id="inputValue" rows="6" name="value">{{ $data['value'] or '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputExpire" class="col-sm-2 control-label">Expire</label>

                <div class="col-sm-10">
                    <input type="number" class="form-control expire" id="inputExpire" name="ttl" value="{{ $data['ttl'] or -1 }}">
                </div>
            </div>

            {{ csrf_field() }}
            <input type="hidden" name="conn" value="{{ $conn }}">
            <input type="hidden" name="type" value="string">
            <input type="hidden" name="_method" value="put">
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            <div class="col-sm-offset-2">
            <button type="reset" class="btn btn-default pull-right">Reset</button>
            <button class="btn btn-info">Submit</button>
            </div>
        </div>

    </form>

</div>
<!-- /.card-body -->

@endsection