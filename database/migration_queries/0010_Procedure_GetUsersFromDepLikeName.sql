USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetUsersFromDepLikeName;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetUsersFromDepLikeName(IN department_id INT, IN dep_head_id INT)
BEGIN
    SELECT
        EmployeeId, 
        Username, 
        DepartmentId, 
        CONCAT(Employees.FirstName, ' ', Employees.LastName) AS EmployeeName
    FROM Employees 
    WHERE (Employees.DepartmentId = department_id
        AND Employees.EmployeeId <> dep_head_id 
        AND Employees.EmployeeId <> 1); -- Prevent calling the deparment head himself or the director
END$$
DELIMITER ;