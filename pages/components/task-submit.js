$(document).ready(function() {
    $('#submit-btn').click(function() {
      const fileInput = $('input[type="file"]');
      
      if (fileInput[0].files.length === 0) {
        alert('Please select a file!');
        return;
      }
      
      const formData = new FormData($('form')[0]);
      
      $.ajax({
        url: 'submit-form.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          alert('Form submitted successfully!');
        },
        error: function(xhr) {
          alert('Error submitting form!');
        }
      });
    });
  });
  