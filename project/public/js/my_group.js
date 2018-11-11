$(document).ready(function () {
$('.menu-item-link').on('click',function () {
    $('.menu-item a.active').removeClass('active');
    $(this).addClass('active');
})

})
