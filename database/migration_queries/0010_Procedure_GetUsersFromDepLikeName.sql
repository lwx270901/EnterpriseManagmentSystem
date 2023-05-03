USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetUsersFromDepLikeName;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetUsersFromDepLikeName(IN department_id INT, IN dep_head_id INT, IN name_string VARCHAR(51))
BEGIN
    SELECT * FROM Employees 
    WHERE CONCAT(Employees.FirstName, ' ', Employees.LastName) LIKE CONCAT('%', name_string, '%')
    AND (Employees.DepartmentId = department_id
        AND Employees.EmployeeId <> dep_head_id 
        AND Employees.EmployeeId <> 1); -- Prevent calling the deparment head himself or the director
END$$
DELIMITER ;