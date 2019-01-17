@extends('adminlte::page')

@section('title','Add Store')
@section('content_header')
    <h1>Add Store</h1>
    {{-- @dd($id); --}}
@stop

{{-- @dd($stores); --}}
@section('content')
        <div class="row">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill the new store data</h3>
                </div>
                <form method="POST" action="{{route('upstore')}}" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id" value={{$id}}>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="email" class="col-sm-2 control label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control label">Address</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="phone" class="col-sm-2 control label">phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                                </div>
                            </div>
                        
                        <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-2">
                                        <button type="submit"
                                        class="btn btn-primary btn-block btn-flat"
                                        >Submit</button>
                                </div>
                        </div>
                        
                    </div>
                </form>
            </div>

        </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop