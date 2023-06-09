// Get references to the relevant DOM elements
const form = document.querySelector('form');
const submitBtn = document.querySelector('#submit-btn');

// Add an event listener to the submit button
submitBtn.addEventListener('click', (event) => {
  event.preventDefault();
  
  // Check if a file has been selected
  const fileInput = document.querySelector('input[type="file"]');
  if (!fileInput.value) {
    alert('Please select a file before submitting.');
    return;
  }
  
  // Create a new FormData object to hold the form data and the file
  const formData = new FormData(form);
  
  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();
  
  // Set up the request
  xhr.open('POST', '/pages/employee/submit-task.php');

  // Set up the response handler
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log('Submission successful!');
      alert('Submission successful!');

      // Redirect the user to the employee dashboard
      window.location.href = 'index.php?func=employee-dashboard';

    } else {
      console.log('Submission failed.');
    }
  };
  
  // Send the request with the form data and file
  xhr.send(formData);
});

