@extends('adminlte::page')

@section('title','Dashboard')
@section('content_header')
    <h1>Products</h1>
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
                                        <li class="active"><a href="{{route('create-product')}}">Add new  </a></li>
                                        </ul>
                                    </div>
                            </nav>
                    </div>  
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped data-table" id="dataTable">
                            <thead>
                                <th>Id</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
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
                                        <td><a class="fa fa-pencil" href="/edit-product/{{$product->id}}" style="color : black"></a></td>

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