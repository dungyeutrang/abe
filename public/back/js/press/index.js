$(function () {
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{'header': 1}, {'header': 2}],               // custom button values
        [{'list': 'ordered'}, {'list': 'bullet'}],
        [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
        [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
        [{'direction': 'rtl'}],                         // text direction

        [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
        [{'header': [1, 2, 3, 4, 5, 6, false]}],

        [{'color': []}, {'background': []}],          // dropdown with defaults from theme
        [{'font': []}],
        [{'align': []}],

        ['clean'],                                         // remove formatting button
        ['link', 'image'],
    ];

    var quill = new Quill('#press_vi', {
        modules: {
            toolbar: toolbarOptions,
        },
        placeholder: 'Please type...',
        theme: 'snow'
    });

    var quillMore = new Quill('#press_en', {
        modules: {
            toolbar: toolbarOptions,
        },
        placeholder: 'Please type...',
        theme: 'snow'
    });

    $('#save').click(function () {
        var token = $('input[name="_token"]').val();
        var pressVI = $('#press_vi .ql-editor').html();
        var pressEn = $('#press_en .ql-editor').html();
        $.ajax({
            type: 'POST',
            data: {_token: token, press_vi: pressVI, press_en: pressEn},
            success: function (data) {
                location.reload();
            }, error: function () {
                alert('Save error');
            }

        })
    })

});