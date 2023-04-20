// Retrieve tasks for the logged-in user using Ajax
function getTasks() {
  // Get the task list table body
  const taskList = document.getElementById("task-list");

  // Create an Ajax request
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Parse the response as JSON
      const tasks = JSON.parse(this.responseText);

      // Remove all existing task rows
      taskList.innerHTML = "";

      // Populate the task rows from the template
      const taskTemplate = document.getElementById("task-template");
      for (let task of tasks) {
        // Clone the task template and populate the task data
        const taskRow = taskTemplate.content.cloneNode(true);
        taskRow.querySelector(".task-name").textContent = task.Description;
        taskRow.querySelector(".task-status").textContent = task.Status;
        taskRow.querySelector("form").dataset.taskId = task.TaskId;

        // Append the task row to the task list
        taskList.appendChild(taskRow);
      }
    }
  };
  xhr.open("GET", "get_tasks.php");
  xhr.send();
}

// Update a task's status and deadline using Ajax
function updateTask(button) {
  const form = button.closest(".task-form");
  const taskId = form.dataset.TaskId;
  const formData = new FormData(form);

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Parse the response as JSON
      const response = JSON.parse(this.responseText);

      // Update the task status and deadline on the page
      const statusCell = form.parentNode.querySelector(".Status");
      const deadlineCell = statusCell.nextElementSibling;
      statusCell.textContent = response.status;
      deadlineCell.textContent = response.DueDate;
    }
  };
  xhr.open("POST", "update_task.php");
  xhr.send(formData);
}
