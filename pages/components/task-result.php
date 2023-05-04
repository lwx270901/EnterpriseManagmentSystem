<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Task Result</title>
</head>

<body>
    <div class="container">
        <h1>Task Result</h1>
        <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "enterprise_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM results";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0)
            {
                echo '<table class="table table-striped bg-white">';
                echo '<thead><tr><th>Result ID</th><th>Assigned Employee</th><th>Task ID</th><th>Created Date</th><th>Result Attachment Link</th></tr></thead>';
                echo '<tbody>';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                    echo '<td>' . $row['ResultId'] . '</td>';
                    echo '<td>' . $row['AssignedEmployeeId'] . '</td>';
                    echo '<td>' . $row['TaskId'] .  '</td>';
                    echo '<td>' . $row['CreatedDate'] . '</td>';
                    echo '<td><a href="' . $row['ResultAttachmentLink'] . '">' . $row['ResultAttachmentLink'] . '</a></td>';
                    echo '</tr>';
                }
                //Close the table body
                echo '</tbody>';
                echo '</table>';

            }
            else {
                echo 'No Tasks found. ';
            }
        ?>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</html>