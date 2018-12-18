$(document).ready(function () {
$('.menu-item-link').on('click',function () {
    $('.menu-item a.active').removeClass('active');
    $(this).addClass('active');
});



// For each .file element
    $('.file').each(function(){
        // Save some elements as variables
        var $element = $(this);
        var $input = $element.find('input');
        var $value = $element.find('.file-value');
        // Bind event handlers to <input>
        $input.on({
            // On change, update the visible elements
            change: function () {
                // Get the value of the input
                var val = $input.val();
                // Normalize strings
                val = val.replace(/\\/g, "/");
                // Remove the path
                val = val.substring(val.lastIndexOf("/") + 1);
                // Toggle the 'active' class based
                // on whether or not there is a value
                $element.toggleClass('active', !!val.length);
                // Set the value text accordingly
                $value.text(val);
            },
            // On focus, add the focus class
            focus: function () {
                $element.addClass('focus');
            },
            // On blur, remove the focus class
            blur: function () {
                $element.removeClass('focus');
            }
        });
    });


})
