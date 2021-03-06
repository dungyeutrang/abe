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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                           @if($id) value="{{$projectCategory->name}}"
                                           @else value="{{old('name')}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Link</label>
                                <div class="col-sm-9">
                                    <input disabled id="link" base_path="{{url('/projects').'/'}}" type="text"
                                           class="form-control"
                                           @if($id) value="{{url('/').$projectCategory->link}}"
                                           @else value="{{url('/projects').'/'}}" @endif>

                                    <input id="link_real" base_path="{{url('/projects').'/'}}" type="hidden"
                                           class="form-control" name="link"
                                           @if($id) value="{{url('/').$projectCategory->link}}"
                                           @else value="{{url('/projects').'/'}}" @endif>
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


@section('script')
    @parent
    <script type="text/javascript" src="{{asset('back/js/project_category/update.js')}}"></script>
@endsection

