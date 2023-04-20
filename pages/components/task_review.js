$(document).ready(function() {
    const taskSearch = $('#task-search');
    const taskList = $('#task-list');
    
    taskSearch.keyup(function() {
      const searchTerm = $(this).val();
      
      if (searchTerm.length >= 3) {
        $.ajax({
          url: '/search-tasks',
          type: 'GET',
          data: { q: searchTerm },
          success: function(response) {
            taskList.empty();
            
            $.each(response, function(index, task) {
              const taskItem = $('<li>').text(task.name);
              
              taskItem.click(function() {
                taskSearch.val(task.name);
                taskList.empty();
              });
              
              taskList.append(taskItem);
            });
          }
        });
      } else {
        taskList.empty();
      }
    });
    
    $('.review-task-form').submit(function(event) {
      event.preventDefault();
      
      const formData = $(this).serialize();
      
      $.ajax({
        url: '/review-task',
        type: 'POST',
        data: formData,
        success: function(response) {
          alert('Form submitted successfully!');
        },
        error: function(xhr) {
          alert('Error submitting form!');
        }
      });
    });
  });
  