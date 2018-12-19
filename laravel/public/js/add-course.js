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

function pageMe(element, pager, tbody, showPrevNext, hidePageNumbers, numItems) {
    const perPage = 4;
    var children = tbody.children('tr');
    var numPages = Math.ceil(numItems / perPage);
    pager.empty();
    pager.data("curr", 0);

    if (numPages > 1) {
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
            pager.find('.prev_link').hide();
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");
    }
    children.hide();
    children.slice(0, perPage + 1).show();
    pager.find('li .page_link').click(function () {
        var clickedPage = $(this).html().valueOf() - 1;
        var listItems = tbody.children('tr');
        goTo(listItems, pager, clickedPage, perPage, numPages);
        return false;
    });
    pager.find('li .prev_link').click(function () {
        var listItems = tbody.children('tr');
        previous(listItems, pager, perPage, numPages);
        return false;
    });
    pager.find('li .next_link').click(function () {
        var listItems = tbody.children('tr');
        next(listItems, pager, perPage, numPages);
        return false;
    });


}

function goTo(children, pager, page, perPage, numPages) {
    var startAt = page * perPage,
        endOn = startAt + perPage + 1;

    children.css('display', 'none').slice(startAt + 1, endOn).show();

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

Array.prototype.swap = function (x, y) {
    if (x >= 0 && x < this.length && y >= 0 && y < this.length) {
        var b = this[x];
        this[x] = this[y];
        this[y] = b;
    }
    return this;
};

$(document).ready(function () {
    var listChapIds = [];
    var listLessons = $('#data-lesson').data('lessons');
    var now = new Date();

    $(function () {
        var id_subject = $('#mySelect').val();
        var list_teacher = $('#list-teacher');
        var listTeachers = $('#hidden').data('teachers');

        for (var key in listTeachers) {
            var teacher = listTeachers[key];
            if (teacher.id_sr == id_subject) {
                var avatar = teacher.avatar != null ? teacher.avatar : "/images/avatar_default.jpg";
                list_teacher.append(' <a class="item-teacher-link" id="hello" href="#">\n' +
                    '                                        <div class="item-teacher">\n' +
                    '                                            <div class="avatar-teacher">' +
                    ' <img src="' + avatar + '" class="rounded-circle"> <div class="infor-teacher">\n' +
                    '                            <h5 data-infor= "' + teacher.uid + '">' + teacher.name + '</h5>\n' +
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
        return false;

    });

    $(document).on('click', "#add-teacher", function () {
        var h5 = $('#modalTeacher a.active h5').eq(0);
        var uid = h5.data('infor');
        var name = h5.html();
        $('div').removeClass('active');
        $(this).addClass("active");
        var inputTeacher = document.getElementById('teachercourse');
        inputTeacher.value = name;
        inputTeacher.dataset.uid = uid;
    });

    $(document).on('click', "#btn-up", function () {
        var row = $(this).closest("tr");
        var currentStt = row.find('td').eq(0).html();
        var previous = row.prev();
        var prevStt = previous.find('td').eq(0).html();
        var visible = previous.find('td').eq(0).is(":visible");
        if (typeof prevStt !== "undefined") {
            row.detach();
            previous.before(row);
            row.find('td').eq(0).html(prevStt);
            previous.find('td').eq(0).html(currentStt);
            if (!visible) {
                previous.show();
                row.hide();
            } else {
                row.fadeOut();
                row.fadeIn();
            }
            // draw the user's attention to it
            listChapIds.swap(currentStt - 1, prevStt - 1);
            updateLessonSelect();

        }


    });

    $(document).on('click', "#btn-down", function () {
        var row = $(this).closest("tr");
        var currentStt = row.find('td').eq(0).html();
        var next = row.next();
        var nextStt = next.find('td').eq(0).html();
        var visible = next.find('td').eq(0).is(":visible");
        if (typeof nextStt !== "undefined") {
            row.detach();
            next.after(row);
            row.find('td').eq(0).html(nextStt);
            next.find('td').eq(0).html(currentStt);
            if (!visible) {
                next.show();
                row.hide();
            } else {
                row.fadeOut();
                row.fadeIn();
            }
            // draw the user's attention to it
            listChapIds.swap(currentStt - 1, nextStt - 1);
            updateLessonSelect();
        }


    });

    $(document).on('click', "#btn-delete", function () {
        var row = $(this).closest("tr");
        row.fadeOut('fast', function () {
            var index = $("#table-select-chapter tbody tr").index(row);
            if (index >= 1 && index <= listChapIds.length) {
                listChapIds.splice(index - 1, 1);
                // listChapIds = listChapIds.slice(0, index - 1 - 1).concat(listChapIds.slice(index - 1, listChapIds.length))
            }
            row.remove();
            updateIndex(index);
            updateLessonSelect();
        });

    });
    $(document).on('click', '#btn-submit', function () {

        var coursenamereg = $('#coursenamereg').val();
        var des = $('#des-course').val();
        var listLesson = [];
        var startDate = formatDateTime(new Date($('#startdate').val()));
        var endDate = formatDateTime(new Date($('#enddate').val()));
        var price = $('#pricecourse').val();
        var idTeacher = $('#teachercourse').data('uid');
        var idSubject = $('#mySelect').val();
        if (!allnumeric(price) || price % 1000 !== 0) {
            swal("Oops!", "Gia khoa hoc khong hop le", "error");
            return;
        }
        if (coursenamereg === "" || des === "" || idTeacher == null) {
            swal("Oops!", "Ban can dien day du thong tin", "error");
            return;
        }
        if (listChapIds.length > 0) {

            $('#bodyLesson input').each(function () {
                listLesson.push({
                        id: $(this).data('lessonid'),
                        dateOpen: formatDateTime(new Date($(this).val()))

                    }
                );
            });
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
                        listchapid: listChapIds,
                        listlessons: listLesson,
                        startdate: startDate,
                        enddate: endDate,
                        price: price,
                        uid: idTeacher,
                        des: des,
                        id_subject: idSubject,

                    },
                    dataType: 'json',

                }).done(function (data) {
                if (data.success == 0) {
                    swal("Oops!", "Có lỗi xảy ra. vui lòng thử lại sau!", "error");
                } else {
                    swal(
                        {
                            title: 'Thong bao',
                            text: 'Them khoa hoc thanh cong',
                            type: 'success',

                        });
                }


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
        var countLesson = 0;
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
                            countLesson++;
                            const item = results[i];
                            tbodyLesson.append('<tr><td>' + rowCount + '</td>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + item.title + '</td>' +
                                '<td> <input type="date" data-lessonid="' + item.id + '"></td>' +
                                '</tr>'
                            );
                            var day = ("0" + now.getDate()).slice(-2);
                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                            var today = now.getFullYear() + "-" + (month) + "-" + (day);
                            $('#bodyLesson input').val(today);

                        }

                    }
                }

            }
        });
        $("#chapter-all").prop("checked", false);
        pageMe('#myBody', $('#myPager'), $('#myBody'), true, false, listChapIds.length);
        pageMe('#bodyLesson', $('#myPagerLesson'), $('#bodyLesson'), true, false, countLesson);
    });

    function updateLessonSelect() {
        var tbodyLesson = $('#table-select-lesson tbody');
        tbodyLesson.empty();
        tbodyLesson.append('<tr></tr>');
        var rowCount = 0;
        var totalRow = 0;
        listChapIds.forEach(function (chapterId) {
            rowCount++;
            const results = listLessons.filter(lesson => lesson.id_chapter === chapterId);
            for (let i = 0; i < results.length; i++) {
                totalRow++;
                const item = results[i];
                tbodyLesson.append('<tr><td>' + rowCount + '</td>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + item.title + '</td>' +
                    '<td> <input type="date" data-lessonid="' + item.id + '"></td>' +
                    '</tr>'
                );

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear() + "-" + (month) + "-" + (day);
                $('#bodyLesson input').val(today);


            }

        });
        pageMe('#bodyLesson', $('#myPagerLesson'), $('#bodyLesson'), true, false, totalRow);

    }

    function updateIndex(indexRm) {
        var perPage = 4;
        var numItems = listChapIds.length;
        var numPages = Math.ceil(numItems / perPage);
        var currentPage = $('#myPager').data('curr');

        $("#table-select-chapter tbody tr").each(function () {

            if ($(this).index() <= (currentPage + 1) * perPage && $(this).index() > currentPage * perPage) {
                $(this).show();
            }
            $(this).find("td").first().html($(this).index());
        });
        if (currentPage >= numPages) currentPage--;
        var pager = $('#myPager');
        pager.empty();
        pager.data("curr", currentPage);

        if (numPages > 1) {
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);

            var curr = 0;
            while (numPages > curr) {
                $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
                curr++;
            }
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
            pager.find('.prev_link').hide();
            if (numPages <= 1) {
                pager.find('.prev_link').hide();
                pager.find('.next_link').hide();
            }
            pager.children().eq(currentPage + 1).find('a').eq(0).addClass("active");

            pager.find('li .page_link').click(function () {
                var clickedPage = $(this).html().valueOf() - 1;
                var listItems = $('#myBody').children('tr');
                goTo(listItems, pager, clickedPage, perPage, numPages);
                return false;
            });
            pager.find('li .prev_link').click(function () {
                var listItems = $('#myBody').children('tr');
                previous(listItems, pager, perPage, numPages);
                return false;
            });
            pager.find('li .next_link').click(function () {
                var listItems = $('#myBody').children('tr');
                next(listItems, pager, perPage, numPages);
                return false;
            });
        }
        var listItems = $('#myBody').children('tr');
        goTo(listItems, pager, currentPage, perPage, numPages);

    }

    $('#mySelect').on('change', function () {
        var id_subject = this.value;
        var list_teacher = $('#list-teacher');
        var listTeachers = $('#hidden').data('teachers');
        $('#table-select-chapter tbody').empty();
        $('#table-select-chapter tbody').append('<tr></tr>');
        $('#table-select-lesson tbody').empty();
        $('#table-select-lesson tbody').append('<tr></tr>');

        for (var key in listTeachers) {
            var teacher = listTeachers[key];
            if (teacher.id_sr == id_subject) {
                var avatar = teacher.avatar != null ? teacher.avatar : "/images/avatar_default.jpg";
                list_teacher.html('');
                list_teacher.append(' <a class="item-teacher-link" id="hello" href="#">\n' +
                    '                                        <div class="item-teacher">\n' +
                    '                                            <div class="avatar-teacher">' +
                    ' <img src="' + avatar + '" class="rounded-circle"> <div class="infor-teacher">\n' +
                    '                            <h5 data-infor= "' + teacher.uid + '">' + teacher.name + '</h5>\n' +
                    '                            <span>' + teacher.title + '</span> </div>');
                list_teacher.append('     </div>\n' +
                    '                                    </a>');

            }

        }
        listChapIds = [];
        pageMe('#myBody', $('#myPager'), $('#myBody'), true, false, listChapIds.length);
        pageMe('#bodyLesson', $('#myPagerLesson'), $('#bodyLesson'), true, false, 0);

    });

    function formatDate(date) {
        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ' ' + year;
    }
});

function formatDateTime(date) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var second = date.getSeconds();
    return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + second;
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function allnumeric(price) {
    var numbers = /^[0-9]+$/;
    if (price.match(numbers)) {

        return true;
    }
    return false;
}
