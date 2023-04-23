// Creating children: Query from database, create children element
// and append too appropriate column

$.ajax({
    url: "/pages/employee/load-tasks.php",
    dataType: "json",
    async: true,
    complete: function (data) {
        if (data.status === 200) {
            const tasks = JSON.parse(data.responseText);
            $.each(tasks, function (key, value) {
                $("#task-id").append(`<div class="element"> ${value.TaskId}</div>`);
                $("#task-desc").append(`<div class="element"> ${value.Description}</div>`);
                $("#deadline").append(`<div class="element"> ${value.DueDate} </div>`);
                $("#assigners").append(`<div class="element"> ${value.AssignedEmployeeId}</div>`);
            });

            showActionButton();
        }
    }
});

////////////////////////////////////

function showActionButton() {
    // Selecting children
    var actionContainer = $(".table-head.action-container");
    var taskIDs = $("#task-id").children(); // used for query

    $.each(taskIDs, function (index, task) {
        //add button for each
        var action = $(".action");
        $('<button/>', {
            text: 'Open',
            class: 'open-btn',
            id: 'open-btn-' + index
        }).wrap("<div/>").parent().appendTo(action);
    });
}


//Handling Button
var target = "";
$(".table-header").click(function (event) {
    if ($(event.target).attr('id').includes("open-btn-")) {
        //front-end stuff
        $(".submit-card").show();
        $(".open-btn").each(function (_, btn) {
            $(btn).css("background-color", "#4CAF50");
        });
        $(event.target).css("background-color", "red");
        //return target
        target = $(event.target);
    }
});

$("#close-btn").click(function (event) {
    $(".submit-card").hide();
    console.log(event);
});

//Handle back-end for submit btn with chosen target
//Check target index with target.attr('id') (open-btn-index)
//From index => get ID from index with taskIDs[index] above
