@extends('adminlte::page')

@section('title','Dashboard')
@section('content_header')
    <h1>Admins</h1>
@stop

@section('js')
<script>
        $(document).ready(function () {
            $('.data-table').dataTable();
        });
    </script>
@endsection

{{-- @dd($stores); --}}
@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                            <nav class="navbar navbar-static-top">
                                    <div class="container">
                                        <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{route('create-admin')}}">Add new  </a></li>
                                        </ul>
                                    </div>
                            </nav>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped data-table" id="dataTable">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{Carbon\Carbon::parse($admin->created_at)->format('d F Y H:i')}}</td>
                                        <td>{{Carbon\Carbon::parse($admin->updated_at)->format('d F Y H:i')}}</td>
                                        <td><a class="fa fa-pencil" href="edit-admin/{{$admin->id}}" style="color : black"></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop