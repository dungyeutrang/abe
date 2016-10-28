var $imageThumb = $('#image_thumb');
var STATUS_OK = 1;
var STATUS_FAILED = 2;
$imageThumb.change(function () {
    $('#image_preview').removeAttr('old_image');
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

var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],
    [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
    [{'font': []}],
    [{'align': []}],
    ['blockquote', 'code-block'],
    [{'header': 1}, {'header': 2}],               // custom button values
    [{'list': 'ordered'}, {'list': 'bullet'}],
    [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
    [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
    [{'direction': 'rtl'}],                         // text direction
    [{'color': []}, {'background': []}],          // dropdown with defaults from theme
    ['link', 'image'],
];

var quillProfileVI = new Quill('#profile_vi', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillStaffVI = new Quill('#staff_vi', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillSummaryVI = new Quill('#summary_vi', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillCompanyVI = new Quill('#company_vi', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillShopandShowroomVI = new Quill('#shop_showroom_vi', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});


var quillProfileEN = new Quill('#profile_en', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillStaffEN = new Quill('#staff_en', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillSummaryEN = new Quill('#summary_en', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillCompanyEN = new Quill('#company_en', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});

var quillShopandShowroomEN = new Quill('#shop_showroom_en', {
    modules: {
        toolbar: toolbarOptions,
    },
    placeholder: 'Please type...',
    theme: 'snow'
});



$('#vi').click(function () {
    $('#en').removeClass('btn-warning');
    $(this).addClass('btn-warning');
    $('div.vi').css('display', 'block');
    $('div.en').css('display', 'none');
});

$('#en').click(function () {
    $('#vi').removeClass('btn-warning');
    $(this).addClass('btn-warning');
    $('div.en').css('display', 'block');
    $('div.vi').css('display', 'none');
});

$('#save').click(function () {
    var formData = new FormData();
    var dataField = $('#form-main').serializeArray();
    $.each(dataField, function (i, vl) {
        formData.append(vl.name, vl.value);
    });

    if ($imageThumb.get(0).files.length) {
        formData.append('avatar', $imageThumb.get(0).files[0]);
    } else {
        var oldImage = $('#image_preview').attr('old_image');
        if (oldImage == undefined) {
            oldImage = '';
        }
        formData.append('avatar', oldImage);
    }

    formData.append('profile_vi', $('#profile_vi .ql-editor').html());
    formData.append('company_vi', $('#company_vi .ql-editor').html());
    formData.append('staff_vi', $('#staff_vi .ql-editor').html());
    formData.append('summary_vi', $('#summary_vi .ql-editor').html());
    formData.append('shop_showroom_vi', $('#shop_showroom_vi .ql-editor').html());

    formData.append('profile_en', $('#profile_en .ql-editor').html());
    formData.append('company_en', $('#company_en .ql-editor').html());
    formData.append('staff_en', $('#staff_en .ql-editor').html());
    formData.append('summary_en', $('#summary_en .ql-editor').html());
    formData.append('shop_showroom_en', $('#shop_showroom_en .ql-editor').html());


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
                $('#alert-error').removeClass('hide').focus();
            }
        }, error: function () {
            alert('Please try again');
        },
        dataType: 'json'
    });
});

