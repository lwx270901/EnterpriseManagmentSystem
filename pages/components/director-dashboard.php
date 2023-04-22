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

        <label for="search-user">Choose department head</label>

        <input type="text" id="search-user" name="user" required><br>

        <button id="add-dh" type="submit"> Add</button>


    </form>
    <div id="dep-results" style="display: none;"></div>
    <div id="user-results" style="display: none;"></div>


</div>
<script type="module" src="pages/components/director-dashboard.js">

</script>