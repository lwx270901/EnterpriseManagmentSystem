import { handleSearch } from "../../assets/js/handleSearch.js"
var searchEmp = $("#searchEmp");
var empResults = $("#employee-results");

handleSearch(searchEmp, empResults, "./pages/department-head/load-user.php");

//submit the form data, check if the description field is not empty, and display an alert message based on the server's response
$(document).ready(function () {
    $('#assign-btn').click(function (event) {
        event.preventDefault();

        const description = $('textarea[name="description"]').val();

        // If task's description is empty
        if (!description.trim()) {
            alert('Please enter a description!');
            return;
        }

        // If task's deadline is empty
        const deadline = $('input[name="deadline"]').val();
        if (!deadline) {
            alert('Please specify a deadline');
            return;
        }

        const deadlineTime = new Date(deadline);
        const currentTime = new Date();

        // If task's deadline is before current time
        if (deadlineTime <= currentTime) {
            alert('Deadline must be later than current time!');
            return;
        }

        // If employee is not specified
        if (!searchEmp.val()) {
            alert('Please choose a valid employee!');
            return;
        }

        const deadlineTimeForMySQL = deadlineTime.toISOString().split('T')[0] + ' ' + deadlineTime.toTimeString().split(' ')[0];

        $.ajax({
            url: 'pages/department-head/add-task.php',
            type: 'POST',
            data: {
                description: description.trim(),
                deadline: deadlineTimeForMySQL,
                employee: searchEmp.val()
            },
            success: function (response) {
                alert('Task assigned successfully!');
            },
            error: function (xhr) {
                alert('Error assigning task!');
            }
        });
    });
});
