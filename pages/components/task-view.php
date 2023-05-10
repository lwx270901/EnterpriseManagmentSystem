<?php
$task_id = $_GET['id'];
$task = $task_control->get_task_by_task_id($task_id)[0];

if ($_SESSION['role'] == 'director' || $_SESSION['role'] == 'department_head') {

} else {

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
                            <?php
                            $task_result = $result_control->get_results_by_task($task['TaskId'])[0];
                            ?>
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
                <?php if ($_SESSION['role'] == 'employee') :?>
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
                            <div class="mb-3">
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
            </div>
        </div>
    </div>
</body>
<?php
unset($_SESSION["message"]);
?>

</html>