<!-- (class for managing tasks) -->
<?php
// Check if user is logged in
if (!$user->is_logged_in()) {
  header('Location: index.php');
  exit();
}

// Check if task ID is set
if (!isset($_GET['id'])) {
  header('Location: dashboard.php');
  exit();
}

// Get task details from database
$stmt = $db->prepare('SELECT t.*, u.username FROM tasks t LEFT JOIN users u ON t.employee_id = u.id WHERE t.id = :id');
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$task = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user has permission to view this task
if ($user->get_user_role() == 'employee' && $task['employee_id'] != $user->get_user_id()) {
  header('Location: dashboard.php');
  exit();
}

// Handle form submission for task approval or rejection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $status = $_POST['status'];
  $comment = $_POST['comment'];

  // Update task status and comment in database
  $stmt = $db->prepare('UPDATE tasks SET status = :status, comment = :comment WHERE id = :id');
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':comment', $comment);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
  
  // Redirect to dashboard
  header('Location: dashboard.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Details</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Task Details</h1>
    <p><strong>Description:</strong> <?php echo $task['description']; ?></p>
    <p><strong>Deadline:</strong> <?php echo date('Y-m-d H:i:s', strtotime($task['deadline'])); ?></p>
    <p><strong>Assigned to:</strong> <?php echo $task['username']; ?></p>
    <?php if ($task['status'] == 'pending'): ?>
      <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id']; ?>" method="POST">
        <div class="mb-3">
          <label for="status" class="form-label">Task Status:</label>
          <select name="status" id="status" class="form-control" required>
            <option value="" selected disabled>Select status</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="comment" class="form-label">Comment:</label>
          <textarea name="comment" id="comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    <?php elseif ($task['status'] == 'approved'): ?>
      <p><strong>Status:</strong> Approved</p>
    <?php elseif ($task['status'] == 'rejected'): ?>
      <p><strong>Status:</strong> Rejected</p>
      <p><strong>Comment:</strong> <?php echo $task['comment']; ?></p>
    <?php endif; ?>
  </div>
  <script src="assets/js/bootstrap.min.js"></script
    </body>