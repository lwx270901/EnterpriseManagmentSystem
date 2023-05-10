// Creating children: Query from database, create children element
// and append too appropriate column
let currentPage = 1;
const pageSize = 10;

// Load first page of tasks
loadTasks(currentPage);

function loadTasks(page) {
    $.ajax({
        url: "/pages/employee/load-task.php",
        dataType: "json",
        async: true,
        data: {
            page: page,
            pageSize: pageSize
        },
        complete: function (data) {
            if (data.status === 200) {
                const tasks = JSON.parse(data.responseText);
                console.log(tasks);
                $.each(tasks, function (key, value) {
                    $("#tasks-list").append(`
                    <div class="card" style="margin: 0.5rem 2rem 0.5rem 2rem; width: 60rem"> 
                        <div class="card-body" style="display: flex">
                            <div>
                                <h5 class="card-title">Task ID: ${value.TaskId}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${value.Description}</h6>
                                <span>Deadline: ${value.DueDate}</span>
                            </div>
                            <div id="task-status-btn" style="margin-left: auto; display: inherit; align-items: center; gap: 5px">
                                <button type="button" class="${getButtonType(value.Status)}" stlye="width: 10rem"
                                >${showStatus(value.Status)}</button>
                                <a class="btn btn-primary action-btn" 
                                href="/index.php?task-view&id=${value.TaskId}" 
                                role="button"
                                id="task-${value.TaskId}">
                                    View task
                                </a>
                            </div>
                        </div>
                    </div>`);
                });
            }
        }
    });
}



$("#prev-btn").click(function () {
    if (currentPage > 1) {
        currentPage--;
        clearTasks();
        loadTasks(currentPage);
    }
});

$("#next-btn").click(function () {
    currentPage++;
    clearTasks();
    loadTasks(currentPage);
});

function clearTasks() {
    $("#task-id").empty();
    $("#task-desc").empty();
    $("#deadline").empty();
    $("#assigners").empty();
    $("#status").empty();
}



// $.ajax({
//     url: "/pages/employee/load-task.php",
//     dataType: "json",
//     async: true,
//     complete: function (data) {
//         if (data.status === 200) {
//             const tasks = JSON.parse(data.responseText);
//             console.log(tasks);
//             $.each(tasks, function (key, value) {
//                 $("#task-id").append(`<div class="element"> ${value.TaskId}</div>`);
//                 $("#task-desc").append(`<div class="element"> ${value.Description}</div>`);
//                 $("#deadline").append(`<div class="element"> ${value.DueDate} </div>`);
//                 $("#assigners").append(`<div class="element"> ${value.AssignerName}</div>`);
//                 $("#status").append(`<div class="element"> ${showStatus(value.Status)}</div>`);
//             });

//             showActionButton();
//         }
//     }
// });

////////////////////////////////////
const statusKv = {
    1: "Not started",
    2: "In progress",
    3: "Completed",
    4: "In Review",
    5: "Verified"
};

function showStatus(status) {
    return statusKv[status];
}

function getButtonType(status){
    switch (status){
        case 1:
            return "btn btn-info";
        case 2:
            return "btn btn-warning";
        case 3:
            return "btn btn-success";
    }
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