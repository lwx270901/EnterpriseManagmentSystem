USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetUsernameById;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetUsernameById(IN emp_id INT)
BEGIN
    SELECT 
        CONCAT(Employees.FirstName, ' ', Employees.LastName) AS EmployeeName
    FROM Employees
    WHERE 
        Employees.EmployeeId = emp_id;
END$$
DELIMITER ;