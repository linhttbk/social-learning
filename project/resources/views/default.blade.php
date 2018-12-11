<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')

</head>
<body>

<div class="super_container">

    <!-- Header -->

    @include('header')

    @yield('content')

<!-- Footer -->
    <footer class="footer">
        @include('includes.footer')
    </footer>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button"
       title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span
            class="glyphicon glyphicon-chevron-up">Back to top</span></a>
</div>
<script>
    $(document).ready(function () {
        $('input[type="checkbox"]').click(function () {
            if ($(this).prop("checked") == true) {
                // var x = document.getElementById("psw").value;
                document.getElementById("psw").type = "text";
            }
            else if ($(this).prop("checked") == false) {
                document.getElementById("psw").type = "password";
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#back-to-top').tooltip('show');

    });
</script>
<script>
    $("#changeInfo").change(function () {
        if($(this).is(":checked")){
            $(".displayItem").removeAttr('disabled');
        }
        else
        {
            $(".displayItem").attr('disabled', '');
        }
    });
</script>

</body>
</html>
