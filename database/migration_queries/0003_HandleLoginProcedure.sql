USE enterprise_db;

-- drop the previous procedure in 0003_HandleLoginProcedure.sql
DROP PROCEDURE IF EXISTS Procedure_HandleEmployeeLogin;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_HandleEmployeeLogin (IN username VARCHAR(50), IN pwd VARCHAR(100))
BEGIN
	SELECT EmployeeId, RoleId, UserName
    FROM employees
    WHERE employees.Username = username
    AND employees.Password = pwd;
END$$
DELIMITER ;