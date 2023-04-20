<!-- page for reviewing task results -->
<form method="post" action=""> <!-- review_task.php is backend -->
  <div class="form-group">
    <label for="task-list">Search task</label>
    <input type="text" class="form-control" id="task-search" name="task-search">
  </div>
  <div id="task-list"></div>
  <div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
      <option value="approved">Approved</option>
      <option value="rejected">Rejected</option>
      <option value="revise">Approved with revisions</option>
    </select>
  </div>
  <div class="form-group">
    <label for="new-deadline">New deadline (if rejected)</label>
    <input type="date" class="form-control" id="new-deadline" name="new-deadline">
  </div>
  <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

<script type="module" src="pages/components/task_review.js">

</script>