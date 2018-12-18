function searchTeacher() {
    var input, filter, div, item, h5, i, txtValue;
    input = document.getElementById("search-teacher");
    filter = input.value.toUpperCase();
    div = document.getElementById("list-teacher");
    item = div.getElementsByClassName("item-teacher");
    for (i = 0; i < item.length; i++) {
        h5 = item[i].getElementsByTagName("h5")[0];
        txtValue = h5.textContent || h5.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            item[i].style.display = "";
        } else {
            item[i].style.display = "none";
        }
    }
}

function pageMe(element, showPrevNext, hidePageNumbers, numItems) {
    const perPage = 4;
    var children = $('#myBody').children('tr');
    var numPages = Math.ceil(numItems / perPage);
    var pager = $('#myPager');
    pager.empty();
    pager.data("curr", 0);
    if (showPrevNext) {
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    var curr = 0;
    while (numPages > curr && (hidePageNumbers == false)) {
        $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
        curr++;
    }
    if (showPrevNext) {
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages <= 1) {
        pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");

    children.hide();
    children.slice(0, perPage).show();
    pager.find('li .page_link').click(function () {
        var clickedPage = $(this).html().valueOf() - 1;
        goTo(children, pager, clickedPage, perPage, numPages);
        return false;
    });
    pager.find('li .prev_link').click(function () {
        previous(children, pager, perPage, numPages);
        return false;
    });
    pager.find('li .next_link').click(function () {
        next(children, pager, perPage, numPages);
        return false;
    });


}

function goTo(children, pager, page, perPage, numPages) {
    var startAt = page * perPage,
        endOn = startAt + perPage;

    children.css('display', 'none').slice(startAt, endOn).show();

    if (page >= 1) {
        pager.find('.prev_link').show();
    }
    else {
        pager.find('.prev_link').hide();
    }

    if (page < (numPages - 1)) {
        pager.find('.next_link').show();
    }
    else {
        pager.find('.next_link').hide();
    }

    pager.data("curr", page);
    pager.find('a').removeClass("active");
    pager.find('li').eq(page + 1).find('a').eq(0).addClass("active");

}

function previous(children, pager, perPage, numPages) {
    var goToPage = parseInt(pager.data("curr")) - 1;
    goTo(children, pager, goToPage, perPage, numPages);
}

function next(children, pager, perPage, numPages) {
    var goToPage = parseInt(pager.data("curr")) + 1;
    goTo(children, pager, goToPage, perPage, numPages);
}


$(document).ready(function () {
    var listChapIds = [];
    var listLessons = $('#data-lesson').data('lessons');

    $(function () {
        var id_subject = $('#mySelect').val();
        var list_teacher = $('#list-teacher');
        var listTeachers = $('#hidden').data('teachers');

        for (var key in listTeachers) {
            var teacher = listTeachers[key];
            if (teacher.id_sr == id_subject) {
                list_teacher.append(' <a class="item-teacher-link" id="hello" href="#">\n' +
                    '                                        <div class="item-teacher">\n' +
                    '                                            <div class="avatar-teacher">' +
                    ' <img src="{{asset("images/avatar_default.jpg")}}" class="rounded-circle"> <div class="infor-teacher">\n' +
                    '                            <h5 data-infor= " ' + teacher.uid + '">' + teacher.name + '</h5>\n' +
                    '                            <span>' + teacher.title + '</span> </div>');
                list_teacher.append('     </div>\n' +
                    '                                    </a>');
            }
        }


    });

    $(document).on('click', "#hello", function () {
        $('a').removeClass('active');
        $('div').removeClass('active');
        $(this).addClass("active");
        var h5 = $(this).find('h5')[0];
        var name = h5.innerHTML;
        var uid = h5.dataset.infor;
        var inputTeacher = document.getElementById('teachercourse');
        inputTeacher.value = name;
        inputTeacher.dataset.uid = uid;
        return false;

    });

    $(document).on('click', "#btn-up", function () {
        var row = $(this).closest("tr");
        var currentStt = row.find('td').eq(0).html();
        var previous = row.prev();
        var prevStt = previous.find('td').eq(0).html();
        if (typeof prevStt !== "undefined") {
            row.detach();
            previous.before(row);
            row.find('td').eq(0).html(prevStt);
            previous.find('td').eq(0).html(currentStt);
            // draw the user's attention to it
            row.fadeOut();
            row.fadeIn();
        }


    });

    $(document).on('click', "#btn-down", function () {
        var row = $(this).closest("tr");
        var currentStt = row.find('td').eq(0).html();
        var next = row.next();
        var nextStt = next.find('td').eq(0).html();
        if (typeof nextStt !== "undefined") {
            row.detach();
            next.after(row);
            row.find('td').eq(0).html(nextStt);
            next.find('td').eq(0).html(currentStt);
            // draw the user's attention to it
            row.fadeOut();
            row.fadeIn();
        }


    });

    $(document).on('click', "#btn-delete", function () {
        var row = $(this).closest("tr");
        row.fadeOut('fast', function () {
            row.remove();
            updateIndex();
        });

    });
    $(document).on('click', '#btn-submit', function () {
        if (listChapIds.length > 0) {
            var coursenamereg = $('#coursenamereg').val();
            alert(coursenamereg);
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
                        title: coursenamereg,
                        listChapId: listChapIds,
                    },


                }).done(function (data) {

                swal('Them thanh cong');

            }).fail(function (jqXHR, ajaxOptions, thrownError) {

                swal("Oops!", "Có lỗi xảy ra. vui lòng thử lại sau!", "error");

            });
        } else {
            swal("Oops!", "Ban chua them Chuong cho khoa hoc", "error");
        }

    });

    $('#chapter-all').on('click', function () {
        $(".item-check").prop("checked", $(this).prop("checked"))
    });
    $(document).on('change', '.item-check', function () {
        if ($(this).prop("checked") == false) {
            alert('hello');
            $("#chapter-all").prop("checked", false)
        }
        if ($(".item-check:checked").length == $(".item-check").length) {
            $("#chapter-all").prop("checked", true)
        }
    });

    $('#button-add').on('click', function () {
        var id_subject = $('#mySelect').val();
        var listChapters = $('#chapter-hidden').data('chapters');
        var tbody = $("#table-chapter tbody");
        tbody.empty();
        for (var position in listChapters) {
            var chapter = listChapters[position];

            if (chapter.id_subject == id_subject && !(listChapIds.indexOf(chapter.id) > -1)) {
                tbody.append('<tr><td><input class="item-check" type="checkbox" data-chapter="' + chapter.id + '"' + '></td>\n' +
                    '<td>' + chapter.title + '</td>' +
                    '<td>' + chapter.lessons + '</td>'
                    + '</tr>');
            }
        }
    });
    $('#button-chapter').on('click', function () {
        var tbody = $('#table-select-chapter tbody');
        var tbodyLesson = $('#table-select-lesson tbody');
        var listChapters = $('#chapter-hidden').data('chapters');
        $('#table-chapter').find('tr').each(function () {
            var row = $(this);
            if (row.find('input[type="checkbox"]').is(':checked')) {
                var idchapter = row.find("td").eq(0).find("input").eq(0).data('chapter');
                var chapter = listChapters.find(chapter => chapter.id == idchapter);
                if (chapter !== "undefined") {
                    if (!(listChapIds.indexOf(chapter.id) > -1)) {
                        listChapIds.push(chapter.id);
                        var rowCount = $('#table-select-chapter tbody tr').length;
                        tbody.append('<tr><td>' + rowCount + '</td>'
                            + '<td>' + chapter.title + '</td>'
                            + '<td>' + chapter.des + '</td>'
                            + '<td>' + chapter.lessons + '</td>'
                            + '<td><button type="button" id="btn-up" class="button-action"><i class="fa fa-arrow-up"></i> </button>'
                            + '<button type="button" id="btn-down" class="button-action"><i class="fa fa-arrow-down"></i> </button>'
                            + '<button type="button" id="btn-delete" class="button-action"><i class="fa fa-remove"></i></button></td>'
                            + '</tr>'
                        );
                        const results = listLessons.filter(lesson => lesson.id_chapter === chapter.id);
                        for (let i = 0; i < results.length; i++) {
                            const item = results[i];
                            tbodyLesson.append('<tr><td>' + rowCount + '</td>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.title + '</td>' +
                                '<td> <input type="date"></td>' +
                                '</tr>'
                            );

                        }


                    }
                }

            }
        });
        $("#chapter-all").prop("checked", false);
        pageMe('#myBody', true, false, listChapIds.length);
    });

    function updateIndex() {
        $("#table-select-chapter tbody tr").each(function () {
            $(this).find("td").first().html($(this).index());
        });
    }

    $('#mySelect').on('change', function () {
        var id_subject = this.value;
        var list_teacher = $('#list-teacher');
        var listTeachers = $('#hidden').data('teachers');
        $('#table-select-chapter tbody').empty();

        for (var key in listTeachers) {
            var teacher = listTeachers[key];
            if (teacher.id_sr == id_subject) {
                list_teacher.html('');
                list_teacher.append(' <a class="item-teacher-link" id="hello" href="#">\n' +
                    '                                        <div class="item-teacher">\n' +
                    '                                            <div class="avatar-teacher">' +
                    ' <img src="{{asset("images/avatar_default.jpg")}}" class="rounded-circle"> <div class="infor-teacher">\n' +
                    '                            <h5 data-infor= " ' + teacher.uid + '">' + teacher.name + '</h5>\n' +
                    '                            <span>' + teacher.title + '</span> </div>');
                list_teacher.append('     </div>\n' +
                    '                                    </a>');

            }

        }


    });
});


