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
    <div class='text-center pb-2'><h4>Manage Employees</h4></div>
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
        $department_head_id = $department_control->get_department_head($department_id);
        $department_head = $employee_control->get_employee_by_id($department_head_id);
        $department_head_name = strval($department_head["FirstName"]) . ' ' . strval($department_head["LastName"]);
        
        ?>
        <tr id="<?php echo $i; ?>">
            <td ><?php echo "$i. "; ?></td>
            <td class = "dep_id"><?php echo $department_id; ?></td>
            <td><?php echo $department_name; ?></td>
            <td><?php echo $department_description; ?></td>
            <td><?php echo $department_head_name; ?></td>
            <td>  <?php 
                // $edit_icon = "<a href='edit-department.php?id={$department_id}' class='btn-sm btn-primary float-right ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                // $delete_icon = " <a href='delete-department.php?id={$department_id}' id='bin' class='btn-sm btn-primary float-right'> <span ><i class='fa fa-trash '></i></span> </a>";
                $edit_icon = "<button type = submit class='edit-btn btn-sm btn-primary float-right ml-3'><span><i class='fa fa-edit '></i></span></button>";
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
</section>

<script type="module" src="pages/director/view-department.js"></script>