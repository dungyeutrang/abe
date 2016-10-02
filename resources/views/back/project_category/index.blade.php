@extends('layouts.app')

@section('htmlheader_title')
    Project Category
@endsection

@section('contentheader_title')
    Project Category
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a href="{{route('back.project_category.update')}}" class="btn btn-success">Add</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-4">Name</th>
                            <th class="col-sm-2">Date Created</th>
                            <th class="col-sm-2">Date Updated</th>
                            <th class="col-sm-3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$dt)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->created_at}}</td>
                                <td>{{$dt->updated_at}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('back.project_category.update',array('id'=>$dt->id))}}"><i class="fa fa-pencil"></i> Update</a>
                                    <a class="btn btn-danger" href="{{route('back.project_category.destroy',array('id'=>$dt->id))}}"><i class="fa fa-trash"></i> Delete</a>
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
