const ITEMS_PER_PAGE = 5;
var currentPage = 1;
var totalPages = 1;
var tasks = [];

$.ajax({
    url: "/pages/employee/load-task.php",
    data: {
        page: currentPage,
        limit: ITEMS_PER_PAGE
    },
    dataType: "json",
    async: true,
    complete: function (data) {
        if (data.status === 200) {
            tasks = JSON.parse(data.responseText);
            totalPages = Math.ceil(tasks.length / ITEMS_PER_PAGE);
            renderTasks(currentPage, tasks);
            renderPagination();
        }
    }
});

function renderTasks(page, tasks) {
    const start = (page - 1) * ITEMS_PER_PAGE;
    const end = start + ITEMS_PER_PAGE;
    const pageTasks = tasks.slice(start, end);
    $("#tasks-list").empty();

    $.each(pageTasks, function (key, value) {
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

function showActionButton(pageTasks) {
    // Selecting children
    var actionContainer = $(".table-head.action-container");
    var taskIDs = pageTasks.map(task => task.TaskId);

    $(".action").empty();

    $.each(taskIDs, function (index, taskId) {
        //add button for each
        $('<button/>', {
            text: 'Open',
            class: 'open-btn',
            id: 'open-btn-' + index
        }).wrap("<div/>").parent().appendTo($(".action"));
    });
    renderPagination();
}

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

function getButtonType(status) {
    switch (status) {
        case 1:
            return "btn btn-info";
        case 2:
            return "btn btn-warning";
        case 3:
            return "btn btn-success";
    }
}


function renderPagination() {
    $("#pagination").empty();

    if (totalPages > 1) {
        for (let i = 1; i <= totalPages; i++) {
            const btn = $('<button/>', {
                text: i,
                class: 'page-btn' + (i === currentPage ? ' active' : '')
            });

            btn.on('click', function () {
                currentPage = i;
                renderTasks(currentPage, tasks);
                renderPagination();
            });

            $("#pagination").append(btn);
        }
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
