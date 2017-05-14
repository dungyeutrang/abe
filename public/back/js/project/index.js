$(function(){
    $('#year').datepicker({
        format: 'yyyy',
        viewMode: "years",
        minViewMode: "years",
        defaultDate: new Date().getFullYear()
    });
});