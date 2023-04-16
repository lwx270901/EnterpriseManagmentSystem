USE enterprise_db;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_HandleEmployeeLogin (IN username VARCHAR(50), IN pwd VARCHAR(100))
BEGIN
	SELECT EmployeeId, RoleId 
    FROM employees
    WHERE Username = username
    AND Password = pwd;
END$$
DELIMITER ;