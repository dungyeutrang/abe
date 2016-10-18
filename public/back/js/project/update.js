$(function () {
    $('#project_content_type_id').select2();
    var $projectContentType = $('#project_content_type_id');
    var $imageThumb = $('#image_thumb');
    var $year = $('#year');
    var STATUS_OK = 1;
    var STATUS_FAILED = 2;
    $year.datepicker({
        format: 'yyyy',
        viewMode: "years",
        minViewMode: "years",
        defaultDate: new Date().getFullYear()
    });
    if (!$year.val()) {
        $year.datepicker('update', new Date());
    }
    $('#project_category_id').change(function () {
        var value = $(this).val();
        $.getJSON(URL_CHANGE_PROJECT_TYPE, {id: value}, function (data) {
            var options = '';
            $.each(data, function (index, value) {
                options = '<option value="' + value.id + '">' + value.name + '</option>';
            })
            $projectContentType.empty();
            $projectContentType.append(options);
        });
    });
    $imageThumb.change(function () {
        if (!$imageThumb.get(0).files.length) {
            $('#image_thumb_container').removeClass('hide');
            $('#image_preview_container').addClass('hide');
        } else {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL($imageThumb.get(0).files[0]);
            $('#image_thumb_container').addClass('hide');
            $('#image_preview_container').removeClass('hide');
        }
    });

    filer_default_opts = {
        changeInput2: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn btn-custom blue-light">Browse Files</a></div></div>',
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-thumb-overlay">\
    										<div class="jFiler-item-info">\
    											<div style="display:table-cell;vertical-align: middle;">\
    												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
    												<span class="jFiler-item-others">{{fi-size2}}</span>\
    											</div>\
    										</div>\
    									</div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <input type="text" class="form-control caption">\
                                        <ul class="list-inline pull-left">\
                                            <li>{{fi-progressBar}}</li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-eye" onclick="previewImage(this)"></a></li>\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
            itemAppend: this.item,
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: true,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
    };

    var listFiles = [];
    $('input.image-old').each(function (index, e) {
        var value = $(e).val();
        listFiles.push({
            name: value.split('/').pop(),
            type: 'image/' + value.split('.').pop(),
            url: BASE_PATH_FILE + value,
            size:562196
        });
    });

    $('#images').filer({
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-folder"></i></div><div class="jFiler-input-text"><h3>Click on this box</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn btn-custom blue-light">Browse Files</a></div></div>',
        showThumbs: true,
        templates: filer_default_opts.templates,
        theme: "dragdropbox",
        extensions: ['jpg', 'png', 'gif', 'jpeg'],
        addMore: true,
        files: listFiles,
    });

    $('#close_modal').click(function () {
        $('#myModal').hide(function () {
            $('input[type="file"]').prop('disabled', false);
        });
    })

    $('#save').click(function () {
        var formData = new FormData();
        var dataField = $('#form-main').serializeArray();
        $.each(dataField, function (i, vl) {
            formData.append(vl.name, vl.value);
        });

        var projectTypeIds = $('#project_content_type_id').val();
        if (projectTypeIds) {
            $.each(projectTypeIds, function (index, projectType) {
                formData.append('type[]', projectType);
            })
        }

        if ($imageThumb.get(0).files.length) {
            formData.append('thumb', $imageThumb.get(0).files[0]);
        }

        var filerKit = $("#images").prop("jFiler").files_list;
        $.each(filerKit, function (index, obj) {
            formData.append('images[]', obj.file);
            formData.append('indexs[]', index);
            if (typeof obj.file == 'string') {
                formData.append('type_files[]', 1);
            } else {
                formData.append('type_files[]', 2);
            }

            formData.append('captions[]', $('.caption').eq(index).val());
        })

        $.ajax({
            type: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if (data.status == STATUS_OK) {
                    window.location.assign(data.url);
                } else if (data.status == STATUS_FAILED) {
                    $('#alert-error').addClass('hide');
                    alert('System has error  !.Please contact admin to resolve');
                } else {
                    $containerError = $('#alert-error ul');
                    $containerError.empty();
                    message = '';
                    $.each(data.errors, function (index, value) {
                        message += '<li>' + value + '</li>';
                    });
                    $containerError.append(message);
                    $('#alert-error').removeClass('hide');
                }
            }, error: function () {
                alert('Please try again');
            },
            dataType: 'json'
        })
    });

})

function previewImage(e) {
    var index = $(e).index('.icon-jfi-eye');
    var filerKit = $("#images").prop("jFiler").files_list;
    var obj = filerKit[index];
    var file = obj.file;
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#image_preview_modal').attr('src', e.target.result);
        $('#myModal').show();
        $('input[type="file"]').prop('disabled', true);
    }
    reader.readAsDataURL(file);
}