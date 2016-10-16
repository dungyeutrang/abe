@extends('layouts.app')

@section('htmlheader_title')
    @if($id)
        Update Project Category
    @else
        Add Project Category
    @endif
@endsection

@section('contentheader_title')
    @if($id)
        Update Project Category
    @else
        Add Project Category
    @endif
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <form action="" method="post" role="form" class="form-horizontal" style="margin-top: 20px">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row-fluid">
                            <div class="alert alert-danger hide">
                                <ul>

                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name"
                                           @if($id) value="{{$projectCategory->name}}"
                                           @else value="{{old('name')}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <a onclick="window.history.back()" class="btn btn-default mg-right-20"><i
                                                class="fa fa-arrow-left"></i> &nbsp;Back</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
