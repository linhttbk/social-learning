$(document).ready(function () {
    var dropMenu = $('.nav-item-dropmenu');
    var notifications = $('.badge-notifications');
    var dropdownSub = $('.dropdown-menu');
    var menuActive = false;

    // dropMenu.on('click', function () {
    //     if (menuActive) {
    //         closeNotifications();
    //     } else {
    //         openNotifications();
    //     }
    // });
    notifications.on('click',function () {
        if (menuActive) {
            closeNotifications();
        } else {
            openNotifications();
        }
    })


    function openNotifications() {
        dropMenu.addClass('active');
        dropdownSub.addClass('show');
        menuActive = true;
    }

    function closeNotifications() {
        dropMenu.removeClass('active');
        dropdownSub.removeClass('show');
        menuActive = false;
    }



})
