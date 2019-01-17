@extends('adminlte::page')

@section('title','Dashboard')
@section('content_header')
    <h1>Store</h1>
@stop

{{-- @dd($stores); --}}
@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                            <nav class="navbar navbar-static-top">
                                    <div class="container">
                                        <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{route('create-store')}}">Add new  </a></li>
                                        </ul>
                                    </div>
                            </nav>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Token</th>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{$store->id}}</td>
                                        <td>{{$store->name}}</td>
                                        <td>{{$store->address}}</td>
                                        <td>{{$store->phone}}</td>
                                        <td>{{$store->email}}</td>
                                        <td>{{$store->token}}</td>
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