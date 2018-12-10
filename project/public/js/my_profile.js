$("#changeInfo").change(function () {
    if($(this).is(":checked")){
        $("#display").removeAttr('disabled');
        $("#datepicker").removeAttr('disabled');
    }
    else
    {
        $("#display").attr('disabled');
        $("#datepicker").attr('disabled');
    }
});