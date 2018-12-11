/*
    Tabs
 */

$.fn.contentTabs = function () {
    $(this).find(".tab_content").hide(); //Hide all content
    $(this).find("ul.tabs li:first").addClass("activeTab").show(); //Activate first tab
    $(this).find(".tab_content:first").show(); //Show first tab content

    $("ul.tabs li").click(function () {
        $(this).parent().parent().find("ul.tabs li").removeClass("activeTab"); //Remove any "active" class
        $(this).addClass("activeTab"); //Add "active" class to selected tab
        $(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).show(); //Fade in the active content
        return false;
    });
};

$(document).ready(function () {

    var main = $('#form');
    // Tabs
    main.contentTabs();

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap'
    });

    document.getElementById("teacher").style.display = "none";
    document.getElementById("censors").style.display = "none";
    $(window).onload = initValues();


    var username_input = document.getElementById("usernamereg");
    var password_input = document.getElementById("passwordreg");
    var name_input = document.getElementById("name");
    var retype_pass_input = document.getElementById("repasswordreg");
    var email_input = document.getElementById("email");
    var phone_input = document.getElementById("phone");
    var birthday_input = document.getElementById("datepicker");


    username_input.onblur = function () {
        validateUsername();

    };
    username_input.onfocus = function () {

        username_input.style.borderColor = "#ccc";
        username_input.style.backgroundColor = "#ffffff";
        document.getElementById("username-error").style.display = "none";

    };
    password_input.onblur = function () {
        validatePassword();
    };

    password_input.onfocus = function () {

        password_input.style.borderColor = "#ccc";
        password_input.style.backgroundColor = "#ffffff";
        document.getElementById("pass-error").style.display = "none";

    };
    name_input.onblur = function () {
        validateFullName();
    };

    name_input.onfocus = function () {

        name_input.style.borderColor = "#ccc";
        name_input.style.backgroundColor = "#ffffff";
        document.getElementById("name-error").style.display = "none";

    };
    retype_pass_input.onblur = function () {
        retypePassword();
    };

    retype_pass_input.onfocus = function () {

        retype_pass_input.style.borderColor = "#ccc";
        retype_pass_input.style.backgroundColor = "#ffffff";
        document.getElementById("repass-error").style.display = "none";

    };
    email_input.onblur = function () {
        validateEmail();
    };

    email_input.onfocus = function () {

        email_input.style.borderColor = "#ccc";
        email_input.style.backgroundColor = "#ffffff";
        document.getElementById("mail-error").style.display = "none";

    };
    phone_input.onblur = function () {
        validatePhone();
    };

    phone_input.onfocus = function () {

        phone_input.style.borderColor = "#ccc";
        phone_input.style.backgroundColor = "#ffffff";
        document.getElementById("phone-error").style.display = "none";

    };

    birthday_input.onchange = function () {
        if (validateBirthday()) {
            birthday_input.style.borderColor = "#ccc";
            birthday_input.style.backgroundColor = "#ffffff";
            document.getElementById("birthday-error").style.display = "none";
        }
    }

    birthday_input.onfocus = function () {

        birthday_input.style.borderColor = "#ccc";
        birthday_input.style.backgroundColor = "#ffffff";
        document.getElementById("birthday-error").style.display = "none";

    };

});


function initValues() {
    var type = document.getElementById("mySelect").value;
    document.getElementById("teacher").style.display = "none";

    if (type == "0") {
        document.getElementById("teacher").style.display = "none";
        document.getElementById("censors").style.display = "none";

    } else if (type == "1") {
        document.getElementById("teacher").style.display = "block";
        document.getElementById("censors").style.display = "none";
    }

}


function onSubmitCLick() {
    var validUserName = validateUsername();
    var validPass = validatePassword();
    var validFullName = validateFullName();
    var retypePass = retypePassword();
    var validEmail = validateEmail();
    var validPhone = validatePhone();
    var validBirthday = validateBirthday();
    if (!(validUserName && validPass && validFullName && retypePass && validEmail && validPhone && validBirthday)) return false;
}

function validateUsername() {
    var username = document.getElementById("usernamereg").value;
    username = username.trim();
    if (username == null || username === "") {
        document.getElementById("username-error").style.display = "block";
        document.getElementById("usernamereg").style.borderColor = "#ff424f";
        document.getElementById("usernamereg").style.backgroundColor = "#ffd0e5";
        document.getElementById("username-error").textContent = "Vui long nhap ten tai khoan";
        return false;
    } else if (username.length < 6) {
        document.getElementById("username-error").style.display = "block";
        document.getElementById("usernamereg").style.borderColor = "#ff424f";
        document.getElementById("usernamereg").style.backgroundColor = "#ffd0e5";
        document.getElementById("username-error").textContent = "Username qua ngan";
        return false;
    }
    return true;
}

function validatePassword() {
    var password = document.getElementById("passwordreg").value;
    password = password.trim();
    if (password == null || password === "") {
        document.getElementById("pass-error").style.display = "block";
        document.getElementById("passwordreg").style.borderColor = "#ff424f";
        document.getElementById("passwordreg").style.backgroundColor = "#ffd0e5";
        document.getElementById("pass-error").textContent = "Vui long nhap mat khau";
        return false;
    } else if (password.length < 6) {
        document.getElementById("pass-error").style.display = "block";
        document.getElementById("passwordreg").style.borderColor = "#ff424f";
        document.getElementById("passwordreg").style.backgroundColor = "#ffd0e5";
        document.getElementById("pass-error").textContent = "mat khau qua ngan";
        return false;
    }
    return true;
}

function validateFullName() {
    var fullname = document.getElementById("name").value;
    fullname = fullname.trim();
    if (fullname == null || fullname === "") {
        document.getElementById("name-error").style.display = "block";
        document.getElementById("name-error").textContent = "Vui long nhap ho ten";
        document.getElementById("name").style.borderColor = "#ff424f";
        document.getElementById("name").style.backgroundColor = "#ffd0e5";

        return false;
    }
    return true;
}

function retypePassword() {
    var password = document.getElementById("passwordreg").value;
    var rePass = document.getElementById("repasswordreg").value;
    if (password !== rePass) {
        document.getElementById("repass-error").style.display = "block";
        document.getElementById("repasswordreg").style.borderColor = "#ff424f";
        document.getElementById("repasswordreg").style.backgroundColor = "#ffd0e5";
        return false;
    }
    return true;
}

function validateEmail() {
    var mail = document.getElementById("email").value;
    mail = mail.trim();
    if (mail == null || mail === "") {
        document.getElementById("mail-error").style.display = "block";
        document.getElementById("mail-error").textContent = "Vui long nhap Email kich hoat tai khoan!";
        document.getElementById("email").style.borderColor = "#ff424f";
        document.getElementById("email").style.backgroundColor = "#ffd0e5";

        return false;
    }
    if (!isValidateEmail(mail)) {
        document.getElementById("mail-error").style.display = "block";
        document.getElementById("mail-error").textContent = "Email khong hop le!";
        document.getElementById("email").style.borderColor = "#ff424f";
        document.getElementById("email").style.backgroundColor = "#ffd0e5";
        return false;
    }
    return true;

}

function validatePhone() {
    var phone = document.getElementById("phone").value;
    phone = phone.trim();
    if (phone == null || phone === "") {
        document.getElementById("phone-error").style.display = "block";
        document.getElementById("phone-error").textContent = "Vui long nhap so dien thoai!";
        document.getElementById("phone").style.borderColor = "#ff424f";
        document.getElementById("phone").style.backgroundColor = "#ffd0e5";
        return false;
    }
    if (!isValidPhoneNumber(phone)) {
        document.getElementById("phone-error").style.display = "block";
        document.getElementById("phone-error").textContent = "So dien thoai khong hop le!";
        document.getElementById("phone").style.borderColor = "#ff424f";
        document.getElementById("phone").style.backgroundColor = "#ffd0e5";
        return false;
    }
    return true;

}

function validateBirthday() {
    var birthday = document.getElementById("datepicker").value;
    birthday = birthday.trim();
    if (birthday == null || birthday === "") {
        document.getElementById("birthday-error").style.display = "block";
        document.getElementById("birthday-error").textContent = "Vui long chon ngay sinh!";
        document.getElementById("datepicker").style.borderColor = "#ff424f";
        document.getElementById("datepicker").style.backgroundColor = "#ffd0e5";

        return false;
    }
    if (!isValidDate(birthday)) {
        document.getElementById("birthday-error").style.display = "block";
        document.getElementById("birthday-error").textContent = "Ngay sinh khong hop le!";
        document.getElementById("datepicker").style.borderColor = "#ff424f";
        document.getElementById("datepicker").style.backgroundColor = "#ffd0e5";
        return false;
    }
    return true;


}

function isValidDate(d) {
    re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
    if (d != '' && !d.match(re)) return false;
    return true;
}

function isValidateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function isValidPhoneNumber(phone) {
    var re = /^0(1\d{9}|9\d{8})$/;
    return re.test(phone)

}
/*
 Thay doi mat khau
 */
$("#changePassword").change(function () {
    if($(this).is(":checked")){
        $(".password").removeAttr('disabled');
    }
    else
    {
        $(".password").attr('disabled', '');
    }
});
/*
 Check all
 */
$("#check-all").change(function () {
    $(".checkitem").prop("checked", $(this).prop("checked"))
})
$(".checkitem").change(function () {
    if($(this).prop("checked") == false){
        $("#check-all").prop("checked", false)
    }
    if($(".checkitem:checked").length == $(".checkitem").length){
        $("#check-all").prop("checked", true)
    }
})
