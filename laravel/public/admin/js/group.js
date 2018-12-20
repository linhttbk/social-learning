$(document).ready(function () {
        $('.side-navbar li').removeClass('active');
        $('.side-navbar li').eq(3).addClass('active');


    $('#delete-group').on('click', function () {
        var listIdGroup = [];
        $('table tbody tr').find('input').each(function () {
            if (this.checked) {
                listIdGroup.push($(this).val());
            }

        });
        if (listIdGroup.length > 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax(
                {
                    type: 'POST',
                    url: $(this).data('url'),
                    data: {
                        listIdGroup: listIdGroup,
                    },


                }).done(function (data) {
                swal(
                    {
                        title: 'Thong bao',
                        text: 'Xoa thanh cong',
                        type: 'success',

                    },function () {
                        $('body').html(data);
                    });

            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                swal("Oops!", "Có lỗi xảy ra. vui lòng thử lại sau!", "error");

            });
        } else {
            swal("Oops!", "Vui long chon nhom de xoa!", "error");
        }

    });

    function formatDateTime(date) {
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var day = date.getDate();

        // return year + '-' + month + '-' + day ;
        return day + '-' + month + '-' + yea;
    }
});
