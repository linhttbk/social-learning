$(document).ready(function () {
    let isShowMode = false;
    $('#createGroup').click(function () {
        document.getElementById('dialogGroup').style.display = 'block';
    });
    $('#icClose').click(function () {
        document.getElementById('dialogGroup').style.display = 'none';
    });
    $('#btnClose').click(function () {
        document.getElementById('dialogGroup').style.display = 'none';
    });
    $('.mode-group').click(function () {
        if (isShowMode) {
            document.getElementById('dropdown-select').style.display = 'none';
            isShowMode = false;
        } else {
            document.getElementById('dropdown-select').style.display = 'block';
            isShowMode = true;
        }
    });
    $('#select-mode-private').click(function () {
        $('#title-mode').text("Nhóm kín");
        $('#desc-mode').text("Bất cứ ai cũng tìm thấy nhóm và biết được người nào điều hành nhóm. Chỉ thành viên mới xem được ai tham gia nhóm và nội dung họ đăng.");
        $('#value-mode').val('1');
        $('#icon-form-group').removeClass('public');
        $('#icon-form-group').addClass('private');

    });
    $('#select-mode-public').click(function () {
        $('#title-mode').text("Nhóm công khai");
        $('#desc-mode').text("Bất cứ ai cũng tìm được nhóm, xem thành viên và những gì họ đăng.");
        $('#value-mode').val('0');
        $('#icon-form-group').removeClass('private');
        $('#icon-form-group').addClass('public');

    });
    $('#name-group-input').onfocus(function () {
        $('#message-error').style.display = 'none';

    });
    $('#desc-input').onfocus(function () {
        $('#message-error').style.display = 'none';

    });

});

function onFormSubmit() {
    var name = document.getElementById('name-group-input').value;
    var desc = document.getElementById('desc-input').value;

    if (name == "") {
        document.getElementById('message-error').style.display = 'block';
        document.getElementById('message-error').innerHTML = 'Ban chua dien ten nhom';
        return false;
    }
    if (desc == "") {
        document.getElementById('message-error').style.display = 'block';
        document.getElementById('message-error').innerHTML = 'Ban chua dien mo ta';
        return false;
    }
    return true;
}


