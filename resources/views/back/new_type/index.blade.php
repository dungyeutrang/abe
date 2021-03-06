@extends('layouts.app')

@section('htmlheader_title')
    New Type
@endsection

@section('contentheader_title')
    New Type
@endsection

@section('main-content')
    @if(Session::has('message_error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title">{{session('message_error')}}</h5>
        </div>
    @elseif(Session::has('message_success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title">{{session('message_success')}}</h5>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List New Type</h3>
                    <div class="box-tools">
                        <a href="{{route('back.new_type.update')}}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-5">Name</th>
                            <th class="col-sm-2">Updated</th>
                            <th class="col-sm-2">Edit</th>
                            <th class="col-sm-2">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$dt)
                            <tr>
                                <td>{{++$indexBegin}}</td>
                                <td>{{str_limit($dt->name,STR_LIMIT)}}</td>
                                <td>{{date(FORMAT_DATE,strtotime($dt->updated_at))}}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning"
                                       href="{{route('back.new_type.update',array('id'=>$dt->id))}}"><i
                                                class="fa fa-pencil"></i> Update</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger"
                                       href="{{route('back.new_type.destroy',array('id'=>$dt->id))}}"><i
                                                class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.box-body -->
            </div> <!-- /box -->
        </div> <!-- /col -->
    </div> <!--/row-->
@endsection
