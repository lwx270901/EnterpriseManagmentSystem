USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_UpdateResultById;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_UpdateResultById(IN result_id INT, IN attachment VARCHAR(500), IN comment VARCHAR(5000))
BEGIN
	UPDATE Results
    SET 
        Results.ResultAttachmentLink = attachment,
        Results.Comment = comment,
        Results.LastUpdated = NOW()
    WHERE Results.ResultId = result_id;
END$$
DELIMITER ;