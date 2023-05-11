USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetUsersLikesNameWithoutDep;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetUsersLikesNameWithoutDep(IN input VARCHAR(500))
BEGIN
    SELECT 
        EmployeeId, 
        Username, 
        DepartmentId, 
        CONCAT(Employees.FirstName, ' ', Employees.LastName) AS EmployeeName
    FROM Employees
    WHERE 
        (CONCAT(Employees.FirstName, ' ', Employees.LastName) LIKE CONCAT('%', input ,'%')
        AND Employees.DepartmentId IS NULL
        AND Employees.EmployeeId <> 1); -- Prevent calling the director;
END$$
DELIMITER ;