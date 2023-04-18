<link rel="stylesheet" href="assets/css/task-assign.css">

<div class="container-task">
    <form action="" class="row g-0 assign-task">
        <div class="description">

            <label for="description">Description</label>
            <textarea wrap="off" placeholder="enter description..." name="description" autofocus> </textarea>
        </div>
        <div class="col-6 px-0 deadline">
            <label for="deadline"> Deadline</label>
            <input type="datetime-local" name="deadline" id="">
        </div>
        <div class="col-6 px-0 employee">
            <label for="employee">Employee</label>
            <input type="text" name="employee" id="searchEmp">
            <div id="employee-results"></div>

        </div>
        <div class="button">
            <button type="button">Assign</button>
        </div>
    </form>

</div>
<script type="module" src="pages/components/task-assign.js">

</script>