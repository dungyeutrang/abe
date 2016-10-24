/**
 * Created by dungicct on 22/10/2016.
 */
var arrayFiles = [];
$(function () {

    $('img.img-old').each(function (index, e) {
        arrayFiles.push($(e).attr('img_old'));
    });
    console.log(arrayFiles);
    $imageAdd = $('#image_add');
    $imageAdd.change(function () {
        if ($imageAdd.get(0).files.length) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#container-add-image').before(
                    '<div class="form-group image-preview-container" onmouseout="hideEditIcon(this)" onmouseover="showEditIcon(this)">' +
                    '<div class="col-sm-12 text-center" style="margin-bottom: 20px;">' +
                    '<div class="wrapper_image_preview">' +
                    '<img class="image_preview"  src="' + e.target.result + '" onerror="' + IMG_ERROR + '" alt="">' +
                    '<span onclick="deleteImage(this)" class="icon-delete hide" id="icon-edit">' +
                    '<i class="fa fa-trash"></i>' +
                    '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                )
                arrayFiles.push($imageAdd.get(0).files[0]);
            }
            reader.readAsDataURL($imageAdd.get(0).files[0]);
        }
    });

    $('#save').click(function () {
        if (!arrayFiles.length) {
            alert('You must create least a image');
            return;
        }
        var formData = new FormData();
        var token = $('input[name="_token"]').val();
        formData.append('_token', token);
        $.each(arrayFiles, function (index, file) {
            formData.append('images[]', file);
            if (typeof  file == 'string') {
                formData.append('types[]', 1);
            } else {
                formData.append('types[]', 2);
            }
        });
        $.ajax({
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if (data.status) {
                    return window.location.assign(data.url);
                }
                alert('Have error !.Please try again');
            },
            error: function (data) {
                alert('Have error !.Please try again');
            }
        })
    })
});

function showEditIcon(e) {
    $(e).find('#icon-edit').removeClass('hide');
}

function hideEditIcon(e) {
    $(e).find('#icon-edit').addClass('hide');
}

function deleteImage(e) {
    var index = $(e).index('.icon-delete');
    arrayFiles.splice(index, 1);
    $('.image-preview-container').eq(index).remove();
}