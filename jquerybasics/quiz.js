$(document).ready(function () {
    $(".harry, .hermione, .ron, .quidditch").prop("disabled", false);
    $(".check").prop("disabled", true);
    $("input[type='radio']").prop("checked", false);
    $("#attempted-questions ul").empty();
});

var itemSelected = false;
var questionSelected = "";

$(".harry").click(function () {
    if (itemSelected) {
        alert("You entered p1!");
        return;
    }
    $(".questionBox").text("The sorting hat put Harry Potter in RAVENCLAW")
    $(".check").prop("disabled", true);
    $("input[type='radio']").prop("checked", false);
    itemSelected = true;
    questionSelected = "harry"
});

$(".hermione").click(function () {
    if (itemSelected) {
        alert("You entered p1!");
        return;
    }
    $(".questionBox").text("Harry played the position of CHASER on his Quidditch team")
    $(".check").prop("disabled", true);
    $("input[type='radio']").prop("checked", false);
    itemSelected = true;
    questionSelected = "hermione"
});

$(".ron").click(function () {
    if (itemSelected) {
        alert("You entered p1!");
        return;
    }
    $(".questionBox").text("Ron Weasley is afraid of SPIDERS")
    $(".check").prop("disabled", true);
    $("input[type='radio']").prop("checked", false);
    itemSelected = true;
    questionSelected = "ron"
});

$(".quidditch").click(function () {
    if (itemSelected) {
        alert("Please answer question first");
        return;
    }
    $(".questionBox").text("Draco Malfoy calls Hermione a MUDBLOOD")
    $(".check").prop("disabled", true);
    $("input[type='radio']").prop("checked", false);
    itemSelected = true;
    questionSelected = "quidditch"
});

$("input[type='radio']").click(function () {
    if (!itemSelected) {
        return
    }
    $(".check").prop("disabled", false);
});

$(".check").click(function () {
    var tf = $("input[type='radio']:checked").val();
    switch (questionSelected) {
        case "harry":
            (tf === "true") ? displayWrong() : displayCorrect()
            $(".harry").prop("disabled", true);
            var newItem = $("<li>Harry</li>");
            (tf === "true") ? newItem.addClass("red-text") : newItem.addClass("green-text");
            $("ul").append(newItem);
            break;
        case "hermione":
            (tf === "true") ? displayCorrect() : displayWrong()
            $(".hermione").prop("disabled", true);
            var newItem = $("<li>Hermione</li>");
            (tf === "true") ? newItem.addClass("green-text") : newItem.addClass("red-text");
            $("ul").append(newItem);
            break;
        case "ron":
            (tf === "true") ? displayCorrect() : displayWrong()
            $(".ron").prop("disabled", true);
            var newItem = $("<li>Ron</li>");
            (tf === "true") ? newItem.addClass("green-text") : newItem.addClass("red-text");
            $("ul").append(newItem);
            break;
        case "quidditch":
            (tf === "true") ? displayCorrect() : displayWrong()
            $(".quidditch").prop("disabled", true);
            var newItem = $("<li>Quidditch</li>");
            (tf === "true") ? newItem.addClass("green-text") : newItem.addClass("red-text");
            $("ul").append(newItem);
            break;
    }

    var allDone = $(".harry").prop("disabled") && $(".hermione").prop("disabled") && $(".ron").prop("disabled") && $(".quidditch").prop("disabled");
    if (allDone) {
        $(".Finished").fadeIn(2000, function () {
            $(this).css("color", "blue").fadeOut(2000, function () {
                $(this).delay(1000).fadeIn(2000, function () {
                    $(this).css("color", "black")
                })
            })
        });
    }
});

function displayCorrect() {
    $(".correct").text("That is correct");
    $(".correct").css("color", "green");
    $(".check").prop("disabled", true);
    questionSelected = "";
    itemSelected = false;
}

function displayWrong() {
    $(".correct").text("That is wrong");
    $(".correct").css("color", "red");
    $(".check").prop("disabled", true);
    questionSelected = "";
    itemSelected = false;
}
