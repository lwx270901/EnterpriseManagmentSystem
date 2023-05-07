USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_AddNewDepartment;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_AddNewDepartment(IN dep_name VARCHAR(50), IN dep_desc VARCHAR(500), IN dep_head_id INT)
BEGIN
    -- Firstly insert a new Department row
    INSERT INTO Departments (DepartmentName, DepartmentDescription)
    VALUES (dep_name, dep_desc);

    -- Then insert a new DepartmentHead row
    INSERT INTO DepartmentHeads(DepartmentHeadId, DepartmentId)
    SELECT dep_head_id, last_insert_id()
    WHERE dep_head_id <> '';
END$$
DELIMITER ;