<link rel="stylesheet" href="assets/css/director-dashboard.css">

<!-- <div class="table-header row px-0 g-0">

    <div class="field-name col-6 px-0" id="department-name">Department name
        <div class="field-name"> d1</div>
        <div class="field-name"> d2</div>

    </div>
    <div class="field-name col-6 px-0" id="department-head">Deparment head
        <div class="field-name"> A</div>
        <div class="field-name"> B</div> 

    </div> -->
<?php
include('pages/director/view-department.php');
?>

<form>
    <label for="search-department">Name the department</label>
    <input type="text" id="search-department" name="deparment" required>

    <label for="department-description">Description</label>
    <input type="text" id="department-description" name="description"><br>

    <label for="selected-user">New department head:</label>
    <option id="selected-user" class="badge bg-info text-dark" style="margin-left: 1rem">None</option>
    <button type="button" class="btn-close" aria-label="Close" style="width: 5px; height: 5px" onclick="removeSelectedUser()"></button>
    <br>
    <br>
    <label for="search-user">Search for user</label>

    <input type="text" class="form-control" id="search-user" name="user" required><br>
    <div id="user-result-dropdown"></div>

    <button id="add-dh" type="submit">Add</button>
</form>

</div>
<script type="module" src="pages/components/director-dashboard.js"></script>
<script>
    function removeSelectedUser() {
        $('#selected-user')[0].value = "";
        $('#selected-user')[0].innerText = "None";
    }
</script>