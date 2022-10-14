function validateForm() {
    var form = document.forms["joinRequestForm"];
    var name = form["name"].value;
    var tag = form["tag"].value;
    var refIsOther = form["referer"].value == "other";
    var c_mean = form["contact-mean"].value;
    var c_info = form["contact-info"].value;
    let firstInvalid;

    switch (c_mean) {
        case "discord":
            if (c_info.search(/^.{3,32}#[0-9]{4}$/g) == -1) {
                form["contact-info"].setCustomValidity("invalid");
                firstInvalid = form["contact-info"];
            } else {
                form["contact-info"].setCustomValidity("");
            }
            break;
        case "instagram":
            c_info.replace(/@/g, "");
            if (c_info.search(/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/g) == -1) {
                form["contact-info"].setCustomValidity("invalid");
                firstInvalid = form["contact-info"];
            } else {
                form["contact-info"].setCustomValidity("");
            }
            break;
        case "messenger":
            if (c_info.search(/^[a-z\d.]{5,}$/i) == -1) {
                form["contact-info"].setCustomValidity("invalid");
                firstInvalid = form["contact-info"];
            } else {
                form["contact-info"].setCustomValidity("");
            }
            break;
        case "email":
            if (c_info.search(/^[a-z\d\.]+@[a-z\.\-]+\.[a-z]+$/i) == -1) {
                form["contact-info"].setCustomValidity("invalid");
                firstInvalid = form["contact-info"];
            } else {
                form["contact-info"].setCustomValidity("");
            }
            break;
    }

    if (refIsOther) {
        var txt = form["txtbox"].value;
        if (txt.search(/^[a-zA-Z\d]+$/gi) == -1) {
            form["txtbox"].setCustomValidity("invalid");
            firstInvalid = form["txtbox"];
        } else {
            form["txtbox"].setCustomValidity("");
        }
    } else {
        form["txtbox"].value = "none";
    }

    if (tag.length == 0) {
        form["tag"].setCustomValidity("invalid");
        firstInvalid = form["tag"];
    } else {
        form["tag"].setCustomValidity("");
    }

    name.toLowerCase();
    let Vname = name.replace(/[^a-z|\ ]/gi, "");
    if (Vname.search(/^[a-z]+\ [a-z]+$/gi) == -1) {
        form["name"].setCustomValidity("invalid");
        firstInvalid = form["name"];
    } else {
        form["name"].setCustomValidity("");
    }

    if (firstInvalid) {
        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center'});
        alert ("Please fill out the form correctly.");
    } else {
        form.submit();
    }
}