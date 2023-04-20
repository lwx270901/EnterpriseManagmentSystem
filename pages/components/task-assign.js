import {handleSearch} from "../../assets/js/handleSearch.js"
var searchEmp = $("#searchEmp");
var empResults = $("#employee-results");

searchEmp.on("input", function(e){
    handleSearch(searchEmp,empResults, "./templates/search-user.php");
});

//submit the form data, check if the description field is not empty, and display an alert message based on the server's response
$(document).ready(function() {
    $('.assign-task').submit(function(event) {
      event.preventDefault();
      
      const description = $('textarea[name="description"]').val();
      
      if (!description.trim()) {
        alert('Please enter a description!');
        return;
      }
      
      $.ajax({
        url: '/assign-task',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          alert('Task assigned successfully!');
        },
        error: function(xhr) {
          alert('Error assigning task!');
        }
      });
    });
  });
  