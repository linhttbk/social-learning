<html>
<head>

    <link rel="stylesheet" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/spinlib/waitMe.css')}}">

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/spinlib/waitMe.js')}}"></script>
</head>
<body>
<div class="containerBlock">
    <form>
        <label>Name</label>
        <input type="text">
        <label>Email</label>
        <input type="text">
        <label>Phone</label>
        <input type="text">
        <button type="button" class="btn btn-primary" id="waitMe_ex">Submit</button>
    </form>
</div>
<script>
    var current_effect = 'image';

    $('#waitMe_ex').click(function () {
        run_waitMe($('.containerBlock>form'), 1, current_effect);

    });

    function run_waitMe(el, num, effect) {
        text = 'Please wait...';
        fontSize = '';
        switch (num) {
            case 1:
                maxSize = '';
                textPos = 'vertical';
                break;
            case 2:
                text = '';
                maxSize = 30;
                textPos = 'vertical';
                break;
            case 3:
                maxSize = 30;
                textPos = 'horizontal';
                fontSize = '18px';
                break;
        }
        el.waitMe({
            effect: 'roundBounce',
            text: 'Loading',
            bg: 'rgba(255,255,255,0.7)',
            color: '#000',
            maxSize: 30,
            waitTime: -1,
            textPos: 'vertical',
            fontSize: '',
            source: 'imgs/img.svg',
            onClose: function () {

            }
        });
    }
</script>

<!-- Button trigger modal -->
<button type="button" id="showDialog" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#showDialog').click(function () {
        document.getElementById('exampleModal').style.display = "block";
        document.getElementById('exampleModal').style.backgroundColor = "#0000000";

        //  $('#exampleModal').style.display = "block";
    });
    $('#btnClose').click(function () {
        document.getElementById('exampleModal').style.display = "none";

        //  $('#exampleModal').style.display = "block";
    });

</script>
</body>
</html>




