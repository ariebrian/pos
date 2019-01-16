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

                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <th>Nama</th>
                                <th>Email</th>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
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