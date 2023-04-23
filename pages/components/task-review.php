<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="result-view">
    <div class="result-comment">
        <div class="comment-header">
            Employee's comment

        </div>
        <div class="row container">

            <div class="col-8 comment">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos similique molestias suscipit nulla
                consequatur
                autem sunt ducimus quisquam, quae aliquid.
            </div>

            <div class="col-4 result-file">
                <button class="fa fa-download" id="download-btn">Download employee's file</button>
            </div>
        </div>
    </div>
</div>

<div class="submit-card">
    <form action="">

        <div class="element comment-section">
            <label for="Comment">Comment</label>
            <textarea wrap="off" placeholder="enter comment" name="comment" autofocus> </textarea>
        </div>
        <div class="row element">
            <label for="new-deadline">New deadline</label>
            <input class="col" type="datetime-local" name="new-deadline" id="new-deadline">
            <div class="col" id="error"></div>

        </div>
        <div class="element btn">
            <button type="button" id="approve-btn">Approve</button>
            <button type="button" id="reject-btn">Reject</button>
            <button type="button" id="request-btn">Request changes</button>
            <button type="button" id="close-btn">Close</button>


        </div>

    </form>

</div>


<script type="module" src="pages/components/task-review.js"></script>