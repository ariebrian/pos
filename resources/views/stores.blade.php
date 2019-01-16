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

                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <th>Nama</th>
                                <th>Alamat</th>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{$store->name}}</td>
                                        <td>{{$store->address}}</td>
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