USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_GetResultByTaskId;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_GetResultByTaskId(IN task_id INT)
BEGIN
    SELECT * FROM Results
    WHERE Results.TaskId = task_id;
END$$
DELIMITER ;