<!-- (template for the task review form) -->
<form method="post" action="review_task.php"> <!-- review_task.php is backend --> 
  <div class="form-group">
    <label for="result">Task result</label>
    <textarea class="form-control" id="result" name="result" rows="3"></textarea>
  </div>
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
    <label for="deadline">New deadline (if applicable)</label>
    <input type="date" class="form-control" id="deadline" name="deadline">
  </div>
  <button type="submit" class="btn btn-primary">Submit Review</button>
</form>
