// Creating children: Query from database, create children element
// and append too appropriate column

$.ajax({
    url: "/pages/employee/load-task.php",
    dataType: "json",
    async: true,
    complete: function (data) {
        if (data.status === 200) {
            const tasks = JSON.parse(data.responseText);
            $.each(tasks, function (key, value) {
                $("#task-id").append(`<div class="element"> ${value.TaskId}</div>`);
                $("#task-desc").append(`<div class="element"> ${value.Description}</div>`);
                $("#deadline").append(`<div class="element"> ${value.DueDate} </div>`);
                $("#assigners").append(`<div class="element"> ${value.AssignerName}</div>`);
                $("#status").append(`<div class="element"> ${showStatus(value.Status)}</div>`);
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

        // Load result information if previously submitted
        let taskPosition = target.attr('id').at(-1);
        let taskId = parseInt($("#task-id").children()[taskPosition].innerText);

        $.ajax({
            type: 'POST',
            url: '/pages/employee/load-result.php',
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
    $("textarea[name='comment']")[0].value = response.Comment;
    $("#attachment-container").show();
    $("#attachment")[0].innerHTML = response.ResultAttachmentLink + ' (' + response.LastUpdated + ')';
}

function clearInputForm() {
    $("textarea[name='comment']")[0].value = "";
    $("#attachment-container").hide();
}

$("#close-btn").click(function (event) {
    $(".submit-card").hide();
});

$("#submit-btn").click(function (event) {
    let taskPosition = target.attr('id').at(-1);
    let taskId = parseInt($("#task-id").children()[taskPosition].innerText);
    let filename = $("input[name='file']").val().replace(/C:\\fakepath\\/i, '');
    let comment = $("textarea[name='comment']").val();

    var data = {
        task_id: taskId,
        status: 3, // Denoting finished task
        comment: comment,
        filename: filename
    };
    $.ajax({
        type: 'POST',
        url: '/pages/employee/submit-task.php',
        data: data,
        success: function (response) {
            console.log('response = ', response);
        },
        error: function (xhr, status, error) {
            console.log('error = ', error);
        }
    });
});

//Handle back-end for submit btn with chosen target
//Check target index with target.attr('id') (open-btn-index)
//From index => get ID from index with taskIDs[index] above