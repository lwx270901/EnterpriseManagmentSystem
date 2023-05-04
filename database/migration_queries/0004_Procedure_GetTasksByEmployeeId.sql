USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetTasksByEmployeeId;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetTasksByEmployeeId(IN employeeId INT)
BEGIN
	SELECT 
    	Tasks.TaskId,  
        Tasks.Description,
        Tasks.CreatedDate,
        Tasks.DueDate,
        Tasks.Status,
        Employees.EmployeeId AS AssignerId,
        CONCAT(Employees.FirstName, ' ', Employees.LastName) AS AssignerName
    FROM Tasks
    JOIN Employees ON Tasks.CreatedByEmployeeId = Employees.EmployeeId
	WHERE Tasks.AssignedEmployeeId = employeeId;
END$$
DELIMITER ;