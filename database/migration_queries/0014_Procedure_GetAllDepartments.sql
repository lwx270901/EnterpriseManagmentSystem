USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetAllDepartments;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetAllDepartments()
BEGIN
    SELECT 
        Departments.DepartmentId,
        Departments.DepartmentName,
        Departments.DepartmentDescription,
        Employees.EmployeeId,
        CONCAT(Employees.FirstName, ' ', Employees.LastName) AS DepartmentHeadName
    FROM Departments
    LEFT JOIN DepartmentHeads ON Departments.DepartmentId = DepartmentHeads.DepartmentId
    LEFT JOIN Employees ON DepartmentHeads.DepartmentHeadId = Employees.EmployeeId;
END$$
DELIMITER ;