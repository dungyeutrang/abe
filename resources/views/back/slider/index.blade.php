@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/jquery_filer/css/jquery.filer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/jquery_filer/css/themes/jquery.filer-dragdropbox-theme.css')}}"
          type="text/css">
@endsection

@section('htmlheader_title')
    Sliders
@endsection

@section('contentheader_title')
    Sliders
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
                    <h3 class="box-title">List Slider</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="sliders">
                        <form action="">
                            {{csrf_field()}}
                            @foreach($sliders as $slider)
                                <div class="form-group image-preview-container" onmouseout="hideEditIcon(this)"
                                     onmouseover="showEditIcon(this)">
                                    <div class="col-sm-12 text-center" style="margin-bottom: 20px;">
                                        <div class="wrapper_image_preview">
                                            <img img_old="{{$slider->name}}" class="image_preview img-old" src="{{asset('upload/'.$slider->name)}}"
                                                 onerror="' + IMG_ERROR + '" alt="">
                                            <span onclick="deleteImage(this)" class="icon-delete hide" id="icon-edit">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            <div class="form-group" id="container-add-image">
                                <div class="col-sm-12">
                                    <input type="file" name="files" id="image_add" class="hide slider_temp">
                                    <div onclick="jQuery('#image_add').click()"
                                         class="jFiler jFiler-theme-dragdropbox" id="image_thumb_container">
                                        <div class="jFiler-input-dragDrop">
                                            <div class="jFiler-input-inner">
                                                <div class="jFiler-input-icon">
                                                    <i class="icon-jfi-folder"></i>
                                                </div>
                                                <div class="jFiler-input-text">
                                                    <h3>Click on this box</h3>
                                                    <span style="display:inline-block; margin: 15px 0">or</span>
                                                </div>
                                                <a class="jFiler-input-choose-btn btn-custom blue-light">Add Slider</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-1">
                                    <a onclick="window.history.back()" class="btn btn-default mg-right-20"><i
                                                class="fa fa-arrow-left"></i> &nbsp;Back</a>
                                    <button type="button" id="save" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div> <!-- /box -->
        </div> <!-- /col -->
    </div> <!--/row-->

@endsection
@section('script')
    @parent
    <script>
        var IMG_ERROR = '{{asset('img/noimage.gif')}}'
    </script>
    <script src="{{asset('back/js/slider/index.js')}}" type="text/javascript"></script>
@endsection