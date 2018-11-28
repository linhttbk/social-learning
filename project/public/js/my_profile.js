$(document).ready(function () {
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap'
    });
    var birthday_input = document.getElementById("datepicker");
});

$("#changePassword").change(function () {
    if($(this).is(":checked")){
        $(".password").removeAttr('disabled');
    }
    else
    {
        $(".password").attr('disabled', '');
    }
});