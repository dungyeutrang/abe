@extends('layouts.app')

@section('htmlheader_title')
    News
@endsection

@section('contentheader_title')
    News
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}" type="text/css">
@endsection

@section('main-content')
    @if(Session::has('message_error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h5 class="modal-title">{{session('message_error')}}</h5>
        </div>
    @elseif(Session::has('message_success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h5 class="modal-title">{{session('message_success')}}</h5>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List News</h3>
                    <div class="box-tools">
                        <a href="{{route('back.new.update')}}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                    <div class="search-box">
                        <div class="row-fluid">
                            <form method="post" action="" class="form-inline text-center form-search-list-project">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                           value="{{$name}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Date" name="date" id="date"
                                           value="{{$date}}">
                                </div>
                                <div class="form-group">
                                    <select name="type" class="form-control" >
                                        @foreach($newTypes as $newType)
                                            <option @if($newType->id == $type) selected @endif value="{{$newType->id}}">{{$newType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success search-btn"><span
                                                class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-2">Name</th>
                            <th class="col-sm-1">Date</th>
                            <th class="col-sm-2">Type</th>
                            <th class="col-sm-2">Thumb</th>
                            <th class="col-sm-2">Updated</th>
                            <th class="col-sm-1">Edit</th>
                            <th class="col-sm-1">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$dt)
                            <tr>
                                <td>{{++$indexBegin}}</td>
                                <td>{{str_limit($dt->name,STR_LIMIT)}}</td>
                                <td>{{$dt->date}}</td>
                                <td>{{$dt->newType->name}}</td>
                                <td><img class="img img-responsive img-thumb-new"
                                         src="{{asset('upload/'.$dt->image_thumb)}}"
                                         onerror="this.src='{{asset('img/noimage.gif')}}'"></td>
                                <td>{{date(FORMAT_DATE,strtotime($dt->updated_at))}}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning"
                                       href="{{route('back.new.update',array('id'=>$dt->id))}}"><i
                                                class="fa fa-pencil"></i> Update</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-danger"
                                       href="{{route('back.new.destroy',array('id'=>$dt->id))}}"><i
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

@section('script')
    @parent
    <script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datepicker/locales/bootstrap-datepicker.vi.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/js/new/index.js')}}"></script>
@endsection
