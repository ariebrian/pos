@extends('adminlte::page')

@section('title','Dashboard')
@section('content_header')
    <h1>Admins</h1>
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
                                        <li class="active"><a href="{{route('create-admin')}}">Add new  </a></li>
                                        </ul>
                                    </div>
                            </nav>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <th>Store</th>
                                <th>Product</th>
                                <th>ID Trans</th>
                                <th>QTY</th>
                                <th>Created At</th>
                                {{-- <th>Updated At</th> --}}
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{$sale->stores->name}}</td>
                                        <td>{{$sale->products->name}}</td>
                                        <td>{{$sale->id_trans}}</td>
                                        <td>{{$sale->qty}}</td>
                                        <td>{{Carbon\Carbon::parse($sale->created_at)->format('d F Y H:i')}}</td>
                                        <td class="fa fa-pencil"></td>
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