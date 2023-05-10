USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetTaskByTaskId;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetTaskByTaskId(IN task_id INT)
BEGIN
    SELECT * FROM Tasks
    WHERE Tasks.TaskId = task_id;
END$$
DELIMITER ;