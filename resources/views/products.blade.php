@extends('adminlte::page')

@section('title','Dashboard')
@section('content_header')
    <h1>Products</h1>
@stop

{{-- @dd($stores); --}}
@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">

                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <th>Id</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->SKU}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>{{$product->updated_at}}</td>
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