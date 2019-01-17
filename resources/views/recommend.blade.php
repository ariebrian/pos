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
                                        <li class="active"><a href="{{route('create-admin')}}">Add new</a></li>
                                        </ul>
                                    </div>
                            </nav>
                </div>
                    <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped data-table" id="dataTable">
                            <thead>
                                <th>User</th>
                                <th>Product</th>
                                <th>Stocks</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th></th>
                            </thead>
                            <tbody>
                                {{-- @dd($store); --}}
                                @foreach ($store as $toko)
                                     @foreach ($toko->products as $item)
                                        @if ($item->pivot->stock < $limit)
                                        <tr>
                                                <td>{{$toko->name}}</td>
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

@section('js')
    <script> console.log('Hi!'); </script>
@stop