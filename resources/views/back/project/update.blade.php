@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/jquery_filer/css/jquery.filer.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/jquery_filer/css/themes/jquery.filer-dragdropbox-theme.css')}}"
          type="text/css">
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}" type="text/css">
    <link href="https://cdn.quilljs.com/1.1.1/quill.snow.css" rel="stylesheet">
@endsection
@section('htmlheader_title')
    @if($id)
        Update Project
    @else
        Add Project
    @endif
@endsection

@section('contentheader_title')
    @if($id)
        Update Project
    @else
        Add Project
    @endif
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <form action="" method="post" id="form-main" role="form" class="form-horizontal"
                      style="margin-top: 20px">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row-fluid">
                            <div tabindex="1" class="alert alert-danger hide" id="alert-error">
                                <ul>

                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                           @if($id) value="{{$project->name}}"
                                           @else value="{{old('name')}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="year" class="col-sm-2 control-label">Year</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="year" name="year"
                                           @if($id) value="{{$project->year}}"
                                           @else value="{{old('year')}}" @endif>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="project_producer_id" class="col-sm-2 control-label">Producer</label>
                                <div class="col-sm-9">
                                    <select name="project_producer_id" id="project_producer_id" class="form-control">
                                        @foreach($projectProducers as $producer)
                                            <option @if(($id && $project->project_producer_id==$producer->id) || (!$id && old('project_producer_id')==$producer->id)) selected
                                                    @endif value="{{$producer->id}}">{{$producer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="project_category_id" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-9">
                                    <?php $categorySelect = $projectCategories[0]; ?>
                                    <select name="project_category_id" id="project_category_id" class="form-control">
                                        @foreach($projectCategories as $category)
                                            <option link="{{url('/').$category->link}}"
                                                    @if(($id && $project->project_category_id==$category->project_category_id) || (!$id && old('project_category_id')==$category->project_category_id)) selected
                                                    <?php $categorySelect = $category ?>        @endif value="{{$category->project_category_id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Link</label>
                                <div class="col-sm-9">
                                    <input disabled id="link_preview" type="text" class="form-control"
                                           @if($id) value="{{url('/').$project->link}}"
                                           @else value="{{url('/').$categorySelect->link}}" @endif>

                                    <input id="link_real" type="hidden" class="form-control" name="link"
                                           @if($id) value="{{url('/').$project->link}}"
                                           @else value="{{url('/').$categorySelect->link}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project_content_type_id" class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-9">
                                    <select name="project_content_type_id" id="project_content_type_id" multiple
                                            class="form-control">
                                        @foreach($projectTypes as $projectType)
                                            @if($id)
                                                @if($projectType->project_category_id == $project->category_id)
                                                    <?php $isSelected = false; ?>
                                                    @foreach($projectContentTypes as $projectContentType)
                                                        @if($projectContentType->project_type_id == $projectType->id)
                                                            <?php $isSelected = true; ?>
                                                            @break;
                                                        @endif
                                                    @endforeach
                                                    <option @if($isSelected) selected
                                                            @endif value="{{$projectType->id}}">{{$projectType->name}}</option>
                                                @endif
                                            @else
                                                @if($projectType->project_category_id == $firstProjectCategory->project_category_id)
                                                    <option value="{{$projectType->id}}">{{$projectType->name}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project_category_id" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-9">
                                    <div style="min-height: 150px" id="desc">{{$project->desc}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="project_category_id" class="col-sm-2 control-label">Thumb</label>
                                <div class="col-sm-9">
                                    <input type="file" name="files[]" id="image_thumb" class="hide">
                                    <div
                                            onclick="jQuery('#image_thumb').click()"
                                            @if($project->image_thumb)  class="hide jFiler jFiler-theme-dragdropbox"
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
                                    <div id="image_preview_container" @if(!$project->image_thumb)class="hide" @endif>
                                        <div id="wrapper_image_preview">
                                            <img @if($project->image_thumb) old_image="{{$project->image_thumb}}"
                                                 @endif onerror="this.src='{{asset('img/noimage.gif')}}'"
                                                 src="{{asset('upload/'.$project->image_thumb)}}" alt=""
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
                                <label for="project_category_id" class="col-sm-2 control-label">Images</label>
                                <div class="col-sm-9">
                                    <input type="file" name="files[]" id="images" multiple="multiple">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <a onclick="window.history.back()" class="btn btn-default mg-right-20"><i
                                                class="fa fa-arrow-left"></i> &nbsp;Back</a>
                                    <button type="button" id="save" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <?php $projectImages = $project->projectImage; ?>
    @foreach($projectImages as $image)
        <input type="hidden" value="{{$image->caption}}" class="caption-old">
        <input type="hidden" value="{{$image->image}}" class='image-old'>
    @endforeach
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- The Close Button -->
        <span class="close" style="cursor: pointer" id="close_modal">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="image_preview_modal" onerror="this.src='{{asset('img/noimage.gif')}}'">
        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>
@endsection

@section('script')
    @parent
    <script type="text/javascript" src="{{asset('plugins/jquery_filer/js/jquery.filer.min.js')}}"></script>
    <script>
        var URL_CHANGE_PROJECT_TYPE = '{{route('back.project.change_project_type')}}';
        var BASE_PATH_FILE = '{{asset('upload').'/'}}';
    </script>
    <script type="text/javascript" src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datepicker/locales/bootstrap-datepicker.vi.js')}}"></script>
    <script src="https://cdn.quilljs.com/1.1.1/quill.js"></script>
    <script type="text/javascript" src="{{asset('back/js/project/update.js')}}"></script>
@endsection
