USE enterprise_db;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_UpdateTaskByTaskId(IN TaskId INT, IN Status INT, IN Comment VARCHAR(200))
BEGIN
	UPDATE tasks
    SET tasks.Status = Status
    WHERE tasks.TaskId = TaskId;
END$$
DELIMITER ;