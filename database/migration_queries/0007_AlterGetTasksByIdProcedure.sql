USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetTasksByEmployeeId;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetTasksByEmployeeId(IN employeeId INT)
BEGIN
	SELECT 
    	tasks.TaskId,  
        tasks.Description,
        tasks.CreatedDate,
        tasks.DueDate,
        tasks.Status,
        employees.EmployeeId AS AssignerId,
        CONCAT(employees.FirstName, ' ', employees.LastName) AS AssignerName
    FROM tasks
    JOIN employees ON tasks.CreatedBy = employees.EmployeeId
	WHERE tasks.AssignedEmployeeId = employeeId;
END$$
DELIMITER ;