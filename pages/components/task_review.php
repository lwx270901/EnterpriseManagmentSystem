<!-- page for reviewing task results -->
<!-- Display tasks table -->
<table>
  <tr>
    <th>Task</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tbody id="task-list">
    <!-- Tasks will be displayed here -->
  </tbody>
</table>

<!-- Template for task row -->
<template id="task-template">
  <tr>
    <td class="task-name"></td>
    <td class="task-status"></td>
    <td>
      <form class="task-form">
        <input type="radio" name="status" value="approved">Approve
        <input type="radio" name="status" value="rejected">Reject
        <input type="radio" name="status" value="revisions">Approved with Revisions
        <input type="text" name="deadline" placeholder="New Deadline">
        <input type="button" value="Update" onclick="updateTask(this)">
      </form>
    </td>
  </tr>
</template>


<script type="module" src="pages/components/task_review.js">

</script>