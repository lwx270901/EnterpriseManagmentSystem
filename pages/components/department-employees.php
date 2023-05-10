<link rel="stylesheet" href="assets/css/director-dashboard.css">
<style>
    table,
    th,
    td {
        border: 1px solid black;
        padding: 15px;
    }

    th {
        color: white;
    }

    #add-emp {
        width: 100%;
        background-color: var(--section-blue);
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        margin-bottom: 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #add-emp:hover {
        background-color: var(--section-blue);
    }
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5">
        <div class='text-center pb-2'>
            <h4>Department Management</h4>
        </div>
        <table style="width:100%" class="table text-center">
            <tr class="bg-dark">
                <th>No.</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Action</th>
            </tr>
            <section id="list" class="list">

                <?php
                $employees_list = $employee_control->get_employees_by_department($_SESSION['dep_id']);

                $i = 1;

                foreach ($employees_list as $emp) :
                    $emp_id = $emp["EmployeeId"];
                    $emp_name = $emp["FirstName"] . ' ' . $emp["LastName"];
                ?>
                    <tr id="<?php echo $i; ?>">
                        <td><?php echo "$i. "; ?></td>
                        <td class="emp_id"><?php echo $emp_id; ?></td>
                        <td><?php echo $emp_name; ?></td>
                        <td>
                            <button class='delete-btn btn-sm btn-primary float-right ml-3'><span><i class='fa fa-trash'></i></span></button>
                        </td>
                    </tr>
                <?php
                    $i++;
                endforeach; ?>
                <?php
                ?>

                <form>
                    <label for="selected-user">Selected employee:</label>
                    <option id="selected-user" class="badge bg-info text-dark" style="margin-left: 1rem">None</option>
                    <button type="button" class="btn-close" aria-label="Close" style="width: 5px; height: 5px"></button>
                    <br>
                    <br>
                    <label for="search-user">Search for employees (Only display employees without department)</label>

                    <input type="text" class="form-control" id="search-user" name="user"><br>
                    <div id="user-result-dropdown"></div>

                    <button id="add-emp" type="submit">Add</button>
                </form>
                <?php
                if (isset($_SESSION['message'])) {
                    echo '  <div class="alert alert-success" role="alert">'
                        . $_SESSION['message'] .
                        '  </div>';
                }
                ?>
    </div>
    <script type="module" src="pages/components/department-dashboard.js"></script>
    <script>
        function removeSelectedUser() {
            $('#selected-user')[0].value = "";
            $('#selected-user')[0].innerText = "None";
        }
    </script>
    <?php
    unset($_SESSION['message']);
    ?>