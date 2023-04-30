<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Task Review</title>
</head>
<body>
    <div class="container my-5">
        <div class="result-view">
            <div class="result-comment">
                <div class="comment-header">
                    Employee's submission
                </div>
                <div class="row container">
                    <div class="col-8 comment" id="employee-comment">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos similique molestias suscipit nulla consequatur autem sunt ducimus quisquam, quae aliquid.
                    </div>
                    <div class="col-4 result-file" id="attachment-container">
                        <div id="attachment"></div>
                        <button class="btn btn-primary" id="download-btn"><i class="fa fa-download"></i> Download employee's file</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit-card mt-5">
            <form action="">
                <div class="mb-3">
                    <label for="Comment" class="form-label">Comment</label>
                    <textarea class="form-control" placeholder="enter comment" name="comment" autofocus></textarea>
                </div>
                <div class="row mb-3">
                    <label for="new-deadline" class="form-label">New deadline</label>
                    <div class="col">
                        <input class="form-control" type="datetime-local" name="new-deadline" id="new-deadline">
                    </div>
                    <div class="col" id="error"></div>
                </div>
                <div class="btn-group" role="group" aria-label="Task review buttons">
                    <button type="button" class="btn btn-success" id="approve-btn">Approve</button>
                    <button type="button" class="btn btn-danger" id="reject-btn">Reject</button>
                    <button type="button" class="btn btn-warning" id="request-btn">Request changes</button>
                    <button type="button" class="btn btn-secondary" id="close-btn">Close</button>
                </div>
            </form>
        </div>
    </div>
    
    <script type="module" src="pages/components/task-review.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</body>
