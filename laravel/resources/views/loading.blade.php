<html>
<head>
    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/quiz.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/loading.js')}}"></script>
</head>
<body>

<button onclick="onButtonClick()" type="button">
    Launch demo modal
</button>
<!-- Modal -->

    <div class="preview" id="preview1" style="display: none">
        <div>
            <span >Xin cho</span>
        </div>
    </div>

</div>
<script>
    $.fn.spin = function (opts) {
        this.each(function () {
            var $this = $(this),
                data = $this.data();

            if (data.spinner) {
                data.spinner.stop();
                delete data.spinner;
            }
            if (opts !== false) {
                data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
            }
        });
        return this;
    };
    $('#preview1').spin();

    //Remove spinner upon click
    $('.preview').click(function () {
        $(this).spin(false);
    });

    function onButtonClick() {
        document.getElementById('preview1').style.display = 'block';
        $('#preview1').spin();
    }
</script>
</body>

</html>
