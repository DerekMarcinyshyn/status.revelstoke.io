@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Monitors</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>url</th>
                            <th>dns</th>
                            <th>status</th>
                            <th>last check</th>
                            <th>cert</th>
                            <th>cert expiry</th>
                            <th>cert issuer</th>
                        </tr>
                        @foreach ($monitors as $monitor)
                            <tr @if ($monitor->uptime_status === 'down') style="background-color:darkred;color:#ddd;" @endif>
                                <td>{{ $monitor->url }}</td>
                                <td><dns :url="'{{ $monitor->url }}'"></dns></td>
                                <td>{{ $monitor->uptime_status }}</td>
                                <td>
                                    @if (! is_null($monitor->uptime_last_check_date))
                                        {{ $monitor->uptime_last_check_date->diffForHumans() }}
                                    @endif
                                </td>
                                <td>{{ $monitor->certificate_status }}</td>
                                <td>
                                    @if (! is_null($monitor->certificate_expiration_date))
                                        {{ $monitor->certificate_expiration_date->diffForHumans() }}
                                    @endif
                                </td>
                                <td>{{ $monitor->certificate_issuer }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
