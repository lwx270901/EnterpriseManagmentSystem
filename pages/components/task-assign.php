<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/task-assign.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Task Assign</title>
</head>
<body>
    <div class="container my-5">
        <div class="row g-0 assign-task">
            <div class="col-md-8 description">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" placeholder="enter description..." name="description" autofocus></textarea>
            </div>
            <div class="col-md-2 deadline">
                <label for="deadline" class="form-label">Deadline</label>
                <input class="form-control" type="datetime-local" name="deadline" id="deadline">
            </div>
            <div class="col-md-2 employee">
                <label for="employee" class="form-label">Employee</label>
                <div class="input-group">
                    <input class="form-control" type="text" name="employee" id="searchEmp" placeholder="Search employee...">
                    <button class="btn btn-outline-secondary" type="button" id="assign-btn">Assign</button>
                </div>
                <div id="employee-results"></div>
            </div>
        </div>
    </div>
    
    <script type="module" src="pages/components/task-assign.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
</html>
