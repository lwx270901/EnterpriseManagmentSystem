<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Task Submit</title>
</head>

<body>
    <div class="container my-5">
        <div class="submit-card">
            <form action="" class="submit-form">
                <div class="mb-3">
                    <label for="Comment" class="form-label">Comment</label>
                    <textarea class="form-control" placeholder="enter comment" name="comment" autofocus></textarea>
                </div>
                <div class="element" id="attachment-container">
                    <b>Your submitted attachment: </b>
                    <div id="attachment"></div>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input class="form-control" type="file" name="file" required>
                </div>
                <div class="btn-group" role="group" aria-label="Task submit buttons">
                    <button type="button" class="btn btn-primary" id="submit-btn">Submit</button>
                    <button type="button" class="btn btn-secondary" id="close-btn">Close</button>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="pages/components/task-submit.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>

<style>
    .btn-group {
    margin: 10px 0px;
}

.submit-form {
    margin: 10px 20px;
}

</style>