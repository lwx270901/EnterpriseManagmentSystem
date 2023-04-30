USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetTasksByDepHeadId;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetTasksByDepHeadId(IN dh_id INT)
BEGIN
	SELECT 
    	Tasks.TaskId,  
        Tasks.Description,
        Tasks.CreatedDate,
        Tasks.DueDate,
        Tasks.Status,
        Tasks.LastUpdated,
        Employees.EmployeeId AS EmployeeId,
        CONCAT(Employees.FirstName, ' ', Employees.LastName) AS EmployeeName
    FROM Tasks
    JOIN Employees ON Tasks.AssignedEmployeeId = Employees.EmployeeId
	WHERE Tasks.CreatedByEmployeeId = dh_id;
END$$
DELIMITER ;