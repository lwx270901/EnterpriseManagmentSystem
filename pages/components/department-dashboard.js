import { handleSearchForDepHead } from "../../assets/js/handleSearch.js"
var searchUser = $("#search-user");
var selectedUser = $("#selected-user");
var userResultDropdown = $("#user-result-dropdown");

$.ajax({
    url: "/pages/department-head/load-task.php",
    dataType: "json",
    async: true,
    complete: function (data) {
        if (data.status === 200) {
            const tasks = JSON.parse(data.responseText);
            $.each(tasks, function (key, value) {
                $("#tasks-list").append(`
                <div class="card" style="margin: 0.5rem 2rem 0.5rem 2rem"> 
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

let allButtons = document.getElementsByClassName('delete-btn');
for (let button of allButtons) {
    button.addEventListener('click', (e) => {
        var clickedElement = e.target;
        var clickedRow = clickedElement.parentNode.parentNode.parentNode.parentNode.id;
        var data = document.getElementById(clickedRow).querySelectorAll('.emp_id');
        var id = data[0].innerHTML;
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/pages/department-head/remove-user.php',
            data: {
                user_id: id
            },
            success: function (response) {
                window.location.reload();
            },
            error: function (xhr, status, error) {
                console.log('error = ', error);
            }
        })
    });
}

$('#add-emp').on("click", function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/pages/department-head/add-employee.php',
        data: {
            user_id: selectedUser.val()
        },
        success: function (response) {
            window.location.reload();
        },
        error: function (xhr, status, error) {
            console.log('error = ', error);
        }
    })
});

searchUser.keyup(function () {
    if (this.value == '') {
        userResultDropdown.hide();
    } else {
        handleSearchForDepHead(searchUser, userResultDropdown, "pages/department-head/load-null-dep-user.php", selectedUser);
    }
})