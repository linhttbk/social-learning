function initSelectValueDocument() {
    var type = document.getElementById("subject").value;
    if (type == "1") {
        document.getElementById("toan").style.display = "block";
        document.getElementById("van").style.display = "none";
        document.getElementById("hoa").style.display = "none";
        document.getElementById("ly").style.display = "none";
        document.getElementById("anh").style.display = "none";
    } else if (type == "2") {
        document.getElementById("toan").style.display = "none";
        document.getElementById("van").style.display = "none";
        document.getElementById("hoa").style.display = "none";
        document.getElementById("ly").style.display = "block";
        document.getElementById("anh").style.display = "none";
    } else if (type == "3") {
        document.getElementById("toan").style.display = "none";
        document.getElementById("van").style.display = "none";
        document.getElementById("hoa").style.display = "block";
        document.getElementById("ly").style.display = "none";
        document.getElementById("anh").style.display = "none";
    } else if (type == "4") {
        document.getElementById("toan").style.display = "none";
        document.getElementById("van").style.display = "block";
        document.getElementById("hoa").style.display = "none";
        document.getElementById("ly").style.display = "none";
        document.getElementById("anh").style.display = "none";
    }
    else {
        document.getElementById("toan").style.display = "none";
        document.getElementById("van").style.display = "none";
        document.getElementById("hoa").style.display = "none";
        document.getElementById("ly").style.display = "none";
        document.getElementById("anh").style.display = "block";
    }
}