@extends('adminlte::page')

@section('title','Add Store')
@section('content_header')
    <h1>Add Product</h1>
    {{-- @dd($id); --}}
@stop

{{-- @dd($Products); --}}
@section('content')
        <div class="row">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill the new Product data</h3>
                </div>
                <form method="POST" action="{{route('upprod')}}" class="form-horizontal">
                    @csrf
                    <div class="box-body">
                            <div class="form-group">
                                    <label for="sku" class="col-sm-2 control label">sku</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="sku" name="SKU" placeholder="sku">
                                    </div>
                                </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="price" class="col-sm-2 control label">price</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="price" name="price" placeholder="price">
                                </div>
                            </div>
                        <input type="hidden" name="id" value={{$id}}>
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