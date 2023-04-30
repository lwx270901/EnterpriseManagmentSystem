// Creating children: Query from database, create children element
// and append too appropriate column

$.ajax({
    url: "/pages/department-head/load-task.php",
    dataType: "json",
    async: true,
    complete: function (data) {
        if (data.status === 200) {
            const tasks = JSON.parse(data.responseText);
            $.each(tasks, function (key, value) {
                $("#task-id").append(`<div class="element"> ${value.TaskId}</div>`);
                $("#task-desc").append(`<div class="element"> ${value.Description}</div>`);
                $("#deadline").append(`<div class="element"> ${value.DueDate} </div>`);
                $("#employee").append(`<div class="element"> ${value.EmployeeName}</div>`);
                $("#status").append(`<div class="element"> ${showStatus(value.Status)}</div>`);
                $("#last-updated").append(`<div class="element"> ${value.LastUpdated}</div>`);
            });

            showActionButton();
        }
    }
});

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

function showStatus(status) {
    const statusKv = {
        1: "Not started",
        2: "In progress",
        3: "Completed",
        4: "In Review",
        5: "Verified"
    };

    return statusKv[status];
}


////////////////////////////////////
// Selecting children
var actionContainer = $(".table-head.action-container");
var taskIDs = $("#task-id").children(); // used for query
var tasks = $("#task-desc").children();

$.each(tasks, function (index, task) {

    //add button for each
    var action = $(".action");
    $('<button/>', {
        text: 'Open',
        class: 'open-btn',
        id: 'open-btn-' + index
    }).wrap("<div/>").parent().appendTo(action);

});
//Handling Button
var target = "";
$(".table-header").click(function (event) {
    if ($(event.target).attr('id').includes("open-btn-")) {
        //front-end stuff
        $(".submit-card").show();
        $(".result-view").show();
        $(".open-btn").each(function (_, btn) {
            $(btn).css("background-color", "#4CAF50");
        });
        $(event.target).css("background-color", "red");
        //return target
        target = $(event.target);

        // Load result information if previously submitted
        let taskPosition = target.attr('id').at(-1);
        let taskId = parseInt($("#task-id").children()[taskPosition].innerText);

        $.ajax({
            type: 'POST',
            url: '/pages/department-head/load-result.php',
            data: {
                task_id: taskId
            },
            success: function (response) {
                // Parse the response into JSON data
                let jsonResponse = JSON.parse(response)[0];

                if (jsonResponse) {
                    fillLoadedResultToForm(jsonResponse);
                } else {
                    clearInputForm();
                }
            },
            error: function (xhr, status, error) {
                console.log('error = ', error);
            }
        })
    }
});

function fillLoadedResultToForm(response) {
    $("#employee-comment")[0].innerHTML = response.Comment;
    $("#attachment-container").show();
    $("#attachment")[0].innerHTML = response.ResultAttachmentLink;
}

function clearInputForm() {
    $("#employee-comment")[0].innerHTML = "";
    $("#attachment-container").hide();
}

$("#close-btn").click(function (event) {
    $(".submit-card").hide();
    $(".open-btn").each(function (_, btn) {
        $(btn).css("background-color", "#4CAF50");
    });
});

//Handle back-end for submit btn with chosen target
//Check target index with target.attr('id') (open-btn-index)
//From index => get ID from index with taskIDs[index] above

//From ID => query ID employee 