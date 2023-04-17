<!-- template for the task assignment form -->

<form method="post" action="assign_task.php"> <!-- assign_task.php is backend -->
  <div class="form-group">
    <label for="description">Task description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="deadline">Deadline</label>
    <input type="date" class="form-control" id="deadline" name="deadline">
  </div>
  <div class="form-group">
    <label for="employee">Employee name</label>
    <select class="form-control" id="employee" name="employee">
      <?php foreach($employees as $employee): ?>
        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Assign Task</button>
</form>
