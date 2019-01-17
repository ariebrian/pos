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
                                        <li class="active"><a href="{{route('create-admin')}}">Add new</a></li>
                                        </ul>
                                    </div>
                            </nav>
                </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <th>User</th>
                                <th>Product</th>
                                <th>Stocks</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th></th>
                            </thead>
                            <tbody>
                                {{-- @dd($products); --}}
                                {{-- store1 prod1
                                    store1  prod2
                                    store2  prod3
                                    store2  prod1 --}}
                                @foreach ($products as $product)
                                     @foreach ($product->products as $item)
                                         <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->pivot->stock }} {{$item->pivot->satuan}}</td>
                                            <td>
                                                @if ($item->pivot->active != 0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                         </tr>
                                     @endforeach  
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