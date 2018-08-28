<div class="row">

    <div class="col-md-3">
        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">Connections</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="card-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($connections as $name => $connection)
                        <li @if($name == $conn)class="active"@endif>
                            <a href=" {{ route('redis-index', ['conn' => $name]) }}">
                                <i class="fa fa-database"></i> {{ $name }}  &nbsp;&nbsp;<small>[{{ $connection['host'].':'.$connection['port'] }}]</small>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-info card-outline collapsed-card">
            <div class="card-header with-border">
                <h3 class="card-title">Connection <small><code>{{ $conn }}</code></small></h3>

                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        @foreach($connections[$conn] as $name => $value)
                            <tr>
                                <td width="160px">{{ $name }}</td>
                                <td><span class="badge bg-primary">{{ $value }}</span></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-info card-outline">
            <div class="card-header with-border">
                <h3 class="card-title">Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                    @foreach($info as $part => $detail)
                        <li class="nav-item">
                            <div class="box-header">
                                <span class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $part }}" aria-expanded="false" class="collapsed nav-link" style="font-size: 14px;">
                                        {{ $part }}
                                    </a>
                                </span>
                            </div>
                            <div id="collapse{{ $part }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body no-padding no-border">
                                    <div class="table-responsive">
                                        <table class="table table-striped no-margin">
                                            @foreach($detail as $key => $value)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>
                                                        @if(is_array($value))
                                                            <pre><code>{{ json_encode($value, JSON_PRETTY_PRINT) }}</code></pre>
                                                        @else
                                                            <span class="badge bg-primary">{{ $value }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
            <!-- /.box-body -->
        </div>

    </div>

    <div class="col-md-9">

        @yield('page')

    </div>

</div>

