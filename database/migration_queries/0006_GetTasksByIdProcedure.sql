USE enterprise_db;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetTasksByEmployeeId(IN employeeId INT)
BEGIN
	SELECT * FROM tasks
	WHERE tasks.AssignedEmployeeId = employeeId;
END$$
DELIMITER ;