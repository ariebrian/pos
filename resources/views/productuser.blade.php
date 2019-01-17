@extends('adminlte::page')

@section('title','Dashboard')
@section('content_header')
    <h1>Admins</h1>
@stop
@section('js')
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function () {
            $('#data-table').DataTable();
            $('.data-table').DataTable();
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
                                        <li class="active"><a href="{{route('create-admin')}}">Add new</a></li>
                                        </ul>
                                    </div>
                            </nav>
                </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-stripped data-table">
                                <thead>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Stocks</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                             @foreach ($product->products as $item)
                                                @if ($item->pivot->stock != NULL)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$item->name}}</td>
                                                        @if ($item->pivot->stock == 0)
                                                            <td>{{$item->pivot->stock}}</td>
                                                        @else
                                                            <td>{{$item->pivot->stock }} {{$item->pivot->satuan}}</td>
                                                        @endif
                                                        
                                                    <td>
                                                        @if ($item->pivot->active != 0)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td>{{Carbon\Carbon::parse($item->created_at)->format('d F Y H:i')}}</td>
                                                    <td><a class="fa fa-pencil" href="#" style="color : black"></a></td>
    
                                                </tr>
                                                @else
                                                <td>{{$product->name}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>No Stock</td>
                                                
                                                <td>
                                                    @if ($item->pivot->active != 0)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{Carbon\Carbon::parse($item->created_at)->format('d F Y H:i')}}</td>
                                                <td><a class="fa fa-pencil" href="#" style="color : black"></a></td>
 
                                            </tr>
                                                @endif
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