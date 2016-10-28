@extends('layouts.app')

@section('css')
    <link href="https://cdn.quilljs.com/1.1.1/quill.snow.css" rel="stylesheet">
@endsection

@section('htmlheader_title')
    Press
@endsection

@section('contentheader_title')
    Press
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
                <form action="" method="post" role="form" class="form-horizontal" style="margin-top: 20px">
                {{csrf_field()}}
                <!-- /.box-header -->
                    <div class="box-body ">
                        <div class="row-fluid">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="">Magazine VI</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="press_vi" >
                                        {!! $data->press_vi !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="">Magazine EN</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="press_en" >
                                        {!! $data->press_en !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button class="btn btn-success" type="button" id="save">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->
            </div> <!-- /box -->
        </div> <!-- /col -->
    </div> <!--/row-->
@endsection

@section('script')
    @parent
    <script type="text/javascript" src="{{asset('plugins/quill/quill.js')}}"></script>
    <script type="text/javascript" src="{{asset('back/js/press/index.js')}}"></script>
@endsection
