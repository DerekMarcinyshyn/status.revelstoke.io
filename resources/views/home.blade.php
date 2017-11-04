@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Monitors</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>url</th>
                            <th>uptime status</th>
                            <th>last check</th>
                            <th>cert status</th>
                            <th>cert expiry</th>
                            <th>cert issuer</th>
                        </tr>
                        @foreach ($monitors as $monitor)
                        <tr>
                            <td>{{ $monitor->url }}</td>
                            <td>{{ $monitor->uptime_status }}</td>
                            <td>{{ $monitor->uptime_last_check_date->diffForHumans() }}</td>
                            <td>{{ $monitor->certificate_status }}</td>
                            <td>{{ $monitor->certificate_expiration_date }}</td>
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
