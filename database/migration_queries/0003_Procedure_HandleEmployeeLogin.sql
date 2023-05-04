USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_HandleEmployeeLogin;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_HandleEmployeeLogin (IN username VARCHAR(50), IN pwd VARCHAR(100))
BEGIN
	SELECT EmployeeId, RoleId, UserName, DepartmentId
    FROM Employees
    WHERE Employees.Username = username
    AND Employees.Password = pwd;
END$$
DELIMITER ;