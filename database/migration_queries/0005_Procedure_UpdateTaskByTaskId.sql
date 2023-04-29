USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_UpdateTaskByTaskId;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_UpdateTaskByTaskId(IN TaskId INT, IN Status INT)
BEGIN
	UPDATE Tasks
    SET 
        Tasks.Status = Status,
        Tasks.LastUpdated = NOW()
    WHERE Tasks.TaskId = TaskId;
END$$
DELIMITER ;