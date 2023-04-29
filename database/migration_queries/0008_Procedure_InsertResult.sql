USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_InsertResult;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_InsertResult(IN assignee_id INT, IN task_id INT, IN attachment VARCHAR(500), IN comment VARCHAR(5000))
BEGIN
	INSERT INTO Results (AssignedEmployeeId, TaskId, CreatedDate, LastUpdated, ResultAttachmentLink, Comment)
    VALUES (assignee_id, task_id, NOW(), NOW(), attachment, comment);
END$$
DELIMITER ;