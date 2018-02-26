$(document).ready(function () {
        $("#errorMessage").hide();
        $("#inputResetButton").click(function () {
        $('#orderForm')[0].reset();
    });

    $(window).resize(function(){
        var width = $(window).width();
        if (width > 1920 ) {
            $('#container-wrapper').removeClass('container-fluid').addClass('container');
            $("#footer").removeClass('col-lg-8 col-lg-offset-2').addClass('col-lg-10 col-lg-offset-1');
        }
        else {
            $('#container-wrapper').removeClass('container').addClass('container-fluid');
            $("#footer").removeClass('col-lg-10 col-lg-offset-1').addClass('col-lg-8 col-lg-offset-2');
        }
    }).resize();

$(function(){
    $("[data-hide]").on("click", function(){
        $("." + $(this).attr("data-hide")).hide();
    });
});

});

function validate() {
    $("#errorMessage").empty().hide();
    var errorMessages = [],
        icon = '<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>',
        success = '<span class="glyphicon glyphicon-ok form-control-feedback"></span>',
        closeButton = "<button type='button' class='close' data-hide='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>",
        forms = $("#inputEmail, #inputFirstName, #inputLastName, #inputStreet, #inputZip, #inputTown, #inputText"),
        emailRegEx = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/,
        zipRegEx = /^\d{5}$/;
    forms.parent().removeClass("has-warning has-feedback");
    $(".form-group").children("span").remove();


    if (!$("#inputEmail").val()) {
        errorMessages.push("Ange din <strong>epost</strong>");
        $("#inputEmail").parent().addClass("has-warning has-feedback").append(icon);
    } else if ($("#inputEmail").val()) {
        var isValid = emailRegEx.test($("#inputEmail").val());
        if (!isValid) {
            errorMessages.push("Ange en <strong>korrekt email-address!</strong> <em>(namn@email.com)</em>");
            $("#inputEmail").parent().addClass("has-warning has-feedback").append(icon);
        }
    }

    if (!$("#inputFirstName").val()) {
        errorMessages.push("Ange ditt <strong>förnamn</strong>");
        $("#inputFirstName").parent().addClass("has-warning has-feedback").append(icon);
    }

    if (!$("#inputLastName").val()) {
        errorMessages.push("Ange ditt <strong>efternamn</strong>");
        $("#inputLastName").parent().addClass("has-warning has-feedback").append(icon);
    }

    if (!$("#inputStreet").val()) {
        errorMessages.push("Ange din <strong>gatuadress</strong>");
        $("#inputStreet").parent().addClass("has-warning has-feedback").append(icon);
    }

    if (!$("#inputZip").val()) {
        errorMessages.push("Ange ditt <strong>postnummer</strong> <em>(XXXXX)</em>");
        $("#inputZip").parent().addClass("has-warning has-feedback").append(icon);
    } else if ($("#inputZip").val()) {
        var isValid = zipRegEx.test($("#inputZip").val());
        if (!isValid) {
            errorMessages.push("Ange ett korrekt <strong>postnummer</strong> <em>(XXXXX)</em>");
            $("#inputZip").parent().addClass("has-warning has-feedback").append(icon);
        }
    }

    if (!$("#inputTown").val()) {
        errorMessages.push("Ange en <strong>stad</strong>");
        $("#inputTown").parent().addClass("has-warning has-feedback").append(icon);
    }

    if (!$("#inputText").val()) {
        errorMessages.push("Fyll i din <strong>beställning</strong>");
        $("#inputText").parent().addClass("has-warning has-feedback").append(icon);
    }

    if (errorMessages.length > 0) {
        $("#errorMessage").show().append(closeButton + "<ul id='errorList'>");
        $.each(errorMessages, function (i, val) {
            $("#errorList").append("<li>" + val + "</li>");
        });
        $("#errorMessage").append("</ul>");
        return false;
    } else {
        var conf = confirm("Är du säker på att du vill skicka din beställning?");
        if (conf) {
            return true;
        } else {
            return false;
        }
    }
}



