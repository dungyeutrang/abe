@extends('layouts.app')

@section('htmlheader_title')
    @if($id)
        Update Project Type
    @else
        Add Project Type
    @endif
@endsection

@section('contentheader_title')
    @if($id)
        Update Project Type
    @else
        Add Project Type
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
                                    <input id="name" type="text" class="form-control" name="name"
                                           @if($id) value="{{$projectType->name}}"
                                           @else value="{{old('name')}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Project Category</label>
                                <div class="col-sm-9">
                                    <?php $projectCategorySelected = $projectCategory[0]; ?>
                                    <select id="project_category_id" name="project_category_id" class="form-control">
                                        @foreach($projectCategory as $pc)
                                            <option link="{{url('/').$pc->link.'/type'}}" value="{{$pc->id}}"
                                                    @if($id && $pc->id == $projectType->project_category_id) selected
                                                    <?php $projectCategorySelected = $pc ?>
                                                    @elseif(!$id && old('project_category_id')==$pc->id) <?php $projectCategorySelected = $pc ?>  selected @endif >{{$pc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Link</label>
                                <div class="col-sm-9">
                                    <input disabled id="link_preview" type="text"
                                           class="form-control"
                                           @if($id) value="{{$projectType->link}}"
                                           @else value="{{url('/').$projectCategorySelected->link.'/type'}}" @endif>

                                    <input id="link_real" type="hidden"
                                           class="form-control" name="link"
                                           @if($id) value="{{$projectType->link}}"
                                           @else value="{{url('/').$projectCategorySelected->link.'/type'}}" @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-9">
                                    <a onclick="window.history.back()" class="btn btn-default mg-right-20"><i
                                                class="fa fa-arrow-left"></i> &nbsp;Back</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;Save
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
@endsection

@section('script')
    @parent
    <script type="text/javascript" src="{{asset('back/js/project_type/update.js')}}"></script>
@endsection



