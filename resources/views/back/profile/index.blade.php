@extends('layouts.app')

@section('css')
    <link href="https://cdn.quilljs.com/1.1.1/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/jquery_filer/css/jquery.filer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/jquery_filer/css/themes/jquery.filer-dragdropbox-theme.css')}}"
@endsection

@section('htmlheader_title')
    Profile
@endsection

@section('contentheader_title')
    Profile
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
                <form id="form-main" action="" method="post" role="form" class="form-horizontal" style="margin-top: 20px">
                {{csrf_field()}}
                <!-- /.box-header -->
                    <div class="box-body ">
                        <div class="row-fluid">
                            <div tabindex="1" class="alert alert-danger hide" id="alert-error">
                                <ul>

                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="project_category_id" class="col-sm-2 control-label">Avatar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="files[]" id="image_thumb" class="hide">
                                    <div
                                            onclick="jQuery('#image_thumb').click()"
                                            @if($profile->avatar)  class="hide jFiler jFiler-theme-dragdropbox"
                                            @else class="jFiler jFiler-theme-dragdropbox"
                                            @endif id="image_thumb_container">
                                        <div class="jFiler-input-dragDrop">
                                            <div class="jFiler-input-inner">
                                                <div class="jFiler-input-icon">
                                                    <i class="icon-jfi-folder"></i>
                                                </div>
                                                <div class="jFiler-input-text">
                                                    <h3>Click on this box</h3>
                                                    <span style="display:inline-block; margin: 15px 0">or</span>
                                                </div>
                                                <a class="jFiler-input-choose-btn btn-custom blue-light">Browse
                                                    Files</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="image_preview_container" @if(!$profile->avatar)class="hide" @endif>
                                        <div id="wrapper_image_preview">
                                            <img @if($profile->avatar) old_image="{{$profile->avatar}}"
                                                 @endif onerror="this.src='{{asset('img/noimage.gif')}}'"
                                                 src="{{asset('upload/'.$profile->avatar)}}" alt=""
                                                 id="image_preview">
                                            <span onclick="jQuery('#image_thumb').click()" class="icon-edit"
                                                  id="icon-edit">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="">Profile Info Type</label>
                                <div class="col-sm-10 text-center">
                                    <button type="button" id="vi"  class="btn btn-warning">VI</button>
                                    <button type="button" id="en" class="btn">EN</button>
                                </div>
                            </div>

                            <div class="form-group vi">
                                <label class="col-sm-2 control-label" for="">Summary VI</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="summary_vi" >
                                        {!! $profile->summary_vi !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group vi">
                                <label class="col-sm-2 control-label" for="">Company VI</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="company_vi" >
                                        {!! $profile->company_vi !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group vi">
                                <label class="col-sm-2 control-label" for="">Profile VI</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="profile_vi" >
                                        {!! $profile->profile_vi !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group vi">
                                <label class="col-sm-2 control-label" for="">Shop and Showroom VI</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="shop_showroom_vi" >
                                        {!! $profile->shop_showroom_vi !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group vi">
                                <label class="col-sm-2 control-label" for="">Staff VI</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="staff_vi" >
                                        {!! $profile->staff_vi !!}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group en">
                                <label class="col-sm-2 control-label" for="">Summary EN</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="summary_en" >
                                        {!! $profile->summary_en !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group en">
                                <label class="col-sm-2 control-label" for="">Company EN</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="company_en" >
                                        {!! $profile->company_en !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group en">
                                <label class="col-sm-2 control-label" for="">Profile EN</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="profile_en" >
                                        {!! $profile->profile_en !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group en">
                                <label class="col-sm-2 control-label" for="">Shop and Showroom EN</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="shop_showroom_en" >
                                        {!! $profile->shop_showroom_en !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group en">
                                <label class="col-sm-2 control-label" for="">Staff EN</label>
                                <div class="col-sm-10">
                                    <div  style="min-height:150px" id="staff_en" >
                                        {!! $profile->staff_en !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
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
    <script type="text/javascript" src="{{asset('back/js/profile/index.js')}}"></script>
@endsection
