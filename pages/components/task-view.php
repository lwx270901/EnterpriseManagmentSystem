<?php
$task_id = $_GET['id'];
$task = $task_control->get_task_by_task_id($task_id)[0];
$task_result = array();
$review_list = array();

if ($task["Status"] == 3) {
    $task_result = $result_control->get_results_by_task($task['TaskId'])[0];
    $review_list = $review_control->get_review_by_result_id($task_result['TaskId']);
}

function displayReviewOutcomeButton($status)
{
    switch ($status) {
        case '1':
            return '<button type="button" class="btn btn-success" style="width: 6rem">Approved</button>';
        case '2':
            return '<button type="button" class="btn btn-danger" style="width: 6rem">Rejected</button>';
        case '3':
            return '<button type="button" class="btn btn-warning" style="width: 6rem">Need fix</button>';
    }
}


function displayReviewerName($employee_control, $reviewer_id)
{
    return $employee_control->get_employee_name_by_id($reviewer_id)[0]["EmployeeName"];
}

function displayReview($employee_control, $review_list)
{
    foreach ($review_list as $review) {
        echo '
            <div class="card">
                <div class="card-header" style="display: flex">
                    <h6 class="card-title">' . displayReviewerName($employee_control, $review["ReviewerId"]) . ' reviewed on ' . $review["ReviewTime"] . '</h6>
                    <div style="margin-left: auto">
                    ' . displayReviewOutcomeButton($review["ReviewOutcome"]) . '
                    </div>
                </div>
                <div class="card-body">
                ' . $review["ReviewComment"] . ' 
                </div>
            </div>';
    }
}

?>

<!DOCTYPE html>
<html>
<style>
    #task-detail-container {
        background-color: white;
        border-radius: 5px;
    }

    .card {
        margin-bottom: 1rem;
    }
</style>

<body>
    <div class="container" style="margin-top: 1rem">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="display: flex; margin-bottom: 0px"><?php echo $task['Description']; ?>
                            <div id="task-status" style="margin-left: auto">
                                <?php
                                switch ($task['Status']) {
                                    case "1":
                                        echo '  <form method="post" style="all: unset">
                                                    <input type="submit" name="start-task" class="btn btn-primary" value="Start" />
                                                </form>';
                                        echo '<button type="button" class="btn btn-info">Not started</button>';
                                        break;
                                    case "2":
                                        echo '<button type="button" class="btn btn-warning">In progress</button>';
                                        break;
                                    case "3":
                                        echo '<button type="button" class="btn btn-success">Completed</button>';
                                        break;
                                }

                                if (array_key_exists('start-task', $_POST)) {
                                    $task_control->update_task_status($task['TaskId'], 2);
                                    unset($_POST['start-task']);
                                    header('Location: /index.php?task-view&id=' . $task['TaskId']);
                                }
                                ?>
                            </div>
                        </h3>

                    </div>
                    <div class="card-body">
                        <p class="card-text">Created by: <b><?php echo displayReviewerName($employee_control, $task['CreatedByEmployeeId']); ?></b></p>
                        <p class="card-text">Created at: <?php echo $task['CreatedDate']; ?></p>
                        <p class="card-text">Due date: <?php echo $task['DueDate']; ?></p>
                        <p class="card-text">Last updated: <?php echo $task['LastUpdated']; ?></p>
                    </div>
                </div>
                <!-- Only displays the previous result if task is submitted -->
                <?php if ($task['Status'] == 3) : ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Your submission</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Submitted time: <?php echo $task['LastUpdated']; ?></p>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" placeholder="enter comment" name="comment" readonly><?php echo $task_result['Comment'] ?></textarea>
                            </div>
                            <div class="col-4 result-file" id="attachment-container">
                                <div id="attachment"><?php echo $task_result['ResultAttachmentLink'] ?></div>
                                <button class="btn btn-primary" id="download-btn"><i class="fa fa-download"></i> Download file</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Only displays the submission form for normal employee -->
                <?php if ($_SESSION['role'] == 'employee') : ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo $task['Status'] == 3 ? 'Edit Submission' : 'Submit task'; ?></h5>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo '  <div class="alert alert-success" role="alert">' .
                                    $_SESSION['message']
                                    . '</div>';
                            }
                            ?>
                            <form method="POST" action="../pages/employee/submit-task.php">
                                <div class="mb-3" style="display: none">
                                    <label for="task_id" class="form-label">Task ID:</label>
                                    <input type="text" name="task_id" id="task_id" class="form-control" value="<?php echo $task['TaskId']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <input type="text" name="description" id="description" class="form-control" value="<?php echo $task['Description']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea class="form-control" placeholder="enter comment" name="comment"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Attachment:</label>
                                    <input class="form-control" type="file" name="file" required>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Review box for employee -->
                <?php if ($task['Status'] == 3) : ?>
                    <div class="card">
                        <div class="card-header" style="display: flex">
                            <h5 class="card-title">Reviews</h5>
                        </div>
                        <div class="card-body">
                            <?php echo displayReview($employee_control, $review_list) ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Review box for dep_head -->
                <?php if ($task['Status'] == 3 && $_SESSION['role'] == 'department_head') : ?>
                    <div class="card">
                        <div class="card-header" style="display: flex">
                            <h5 class="card-title">Add review</h5>
                        </div>
                        <form action="../pages/department-head/add-review.php" class="review-form" method="POST">
                            <div class="mb-3">
                                <label for="Comment" class="form-label">Comment</label>
                                <textarea class="form-control" placeholder="enter comment" name="comment" autofocus></textarea>
                            </div>
                            <div id="dtpicker" class="row mb-3" style="display: none">
                                <label for="new-deadline" class="form-label">New deadline</label>
                                <div class="col">
                                    <input class="form-control" type="datetime-local" name="new-deadline" id="new-deadline">
                                </div>
                                <div class="col" id="error"></div>
                            </div>
                            <div class="btn-group" role="group" aria-label="Task review buttons">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="review-outcome" id="flexRadioDefault1" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Approve
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="review-outcome" id="flexRadioDefault2" value="2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Reject
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="review-outcome" id="flexRadioDefault3" value="3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Request changes
                                    </label>
                                </div>
                            </div>
                            <input name="result-id" value="<?php echo $task_result['ResultId'] ?>" style="display:none">
                            <input name="task-id" value="<?php echo $task_id ?>" style="display:none">
                            <button type="submit    ">Submit</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<?php
unset($_SESSION["message"]);
?>

<script>
    $("#flexRadioDefault3").click(function(event) {
        $("#dtpicker").show();
    });

    $("#flexRadioDefault1").click(function(event) {
        $("#dtpicker").hide();
    });

    $("#flexRadioDefault2").click(function(event) {
        $("#dtpicker").hide();
    });
</script>

</html>