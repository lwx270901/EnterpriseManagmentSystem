<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <script src="jquery/jquery-3.6.4.min.js"></script>
</head>
<body>
  <form id="login-form">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
  </form>
  <div id="message"></div>

  <script>
    $(document).ready(function(){
      $('#login-form').on('submit', function(e){
        e.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
          url: '../pages/login.php',
          method: 'POST',
          data: form_data,
          dataType: 'json',
          success: function(data){
            if(data.status === 'success'){
              $('#message').html('<p>' + data.message + '</p>');
              window.location.href = '../pages/dashboard.php';
            } else {
              $('#message').html('<p>' + data.message + '</p>');
            }
          }
        });
      });
    });
  </script>
</body>
</html>
