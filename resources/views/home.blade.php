@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Oauth Credentials</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>End Point</th>
                            <td>{{$data->end_point}}</td>
                        </tr>
                        <tr>
                            <th>Client ID</th>
                            <td>{{$data->client_id}}</td>
                        </tr>
                        <tr>
                            <th>Client Secret</th>
                            <td>{{$data->client_secret}}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{$data->username}}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><em>[Your current password]</em></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
