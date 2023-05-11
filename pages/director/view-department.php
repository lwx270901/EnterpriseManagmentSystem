<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
th {
    color: white;
}

</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Department Management</h4></div>
    <table style="width:100%" class="table text-center">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>Department ID</th>
        <th>Department Name</th>
        <th>Department Description</th> 
        <th>Department Head Name</th>
        <th>Action</th>
    </tr>
    <section id="list" class="list">
<?php 

$departments = $department_control->get_all_departments();
$i = 1;

if($departments) { ?>

    <?php foreach ($departments as $department) : 
        $department_id = $department["DepartmentId"];
        $department_name = $department["DepartmentName"];
        $department_description = $department["DepartmentDescription"];
        $department_head_name = $department["DepartmentHeadName"];   
        
        ?>
        <tr id="<?php echo $i; ?>">
            <td ><?php echo "$i. "; ?></td>
            <td class = "dep_id"><?php echo $department_id; ?></td>
            <td class = "dep_name"><?php echo $department_name; ?></td>
            <td class = "dep_desc"><?php echo $department_description; ?></td>
            <td class = "dep_head"><?php echo $department_head_name; ?></td>
            <td>  <?php 
                // $edit_icon = "<a href='edit-department.php?id={$department_id}' class='btn-sm btn-primary float-right ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                // $delete_icon = " <a href='delete-department.php?id={$department_id}' id='bin' class='btn-sm btn-primary float-right'> <span ><i class='fa fa-trash '></i></span> </a>";
                $edit_icon = "<button type='button' class='edit-btn btn-sm btn-primary float-right ml-3' data-bs-toggle='modal' data-bs-target='#editModal'><span><i class='fa fa-edit '></i></span></button>";
                $delete_icon = " <button class='delete-btn btn-sm btn-primary float-right ml-3 '><span><i class='fa fa-trash '></i></span></button>";
                echo $edit_icon . $delete_icon;
             ?> 
        </td>
        </tr>
    <?php 
    $i++;
    endforeach; ?>
<?php 
} else {
    echo "
    <tr>
    <td colspan='6'>There is no department with department head yet!</td>
    </tr>
 ";
} ?>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit the department information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>  
                <br>
                <label for="search-department-edit">Name of department</label>
                <input type="text" id="name-department-edit" name="deparment" required>

                <label for="department-description-edit">Description</label>
                <input type="text" id="department-description-edit" name="description"><br>

                <label for="selected-user-edit">Department head:</label>
                <option id="selected-user-edit" class="badge bg-info text-dark" style="margin-left: 1rem">None</option>
                <button type="button" class="btn-close" aria-label="Close" style="width: 5px; height: 5px" onclick="removeSelectedEditUser()"></button>
                <br>
                <br>
                <label for="search-user-edit">Search for user</label>

                <input type="text" class="form-control" id="search-user-edit" name="user-edit" required><br>
                <div id="user-edit-result-dropdown"></div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit-dh">Save changes</button>
      </div>
    </div>
  </div>
</div>

</section>
<script>
    function removeSelectedUser() {
    $('#selected-user')[0].value = "";
    $('#selected-user')[0].innerText = "None";
}
    function removeSelectedEditUser() {
        $('#selected-user-edit')[0].value = "";
        $('#selected-user-edit')[0].innerText = "None";
    }
</script>
<script type="module" src="pages/director/view-department.js"></script>