USE enterprise_db;

DROP PROCEDURE IF EXISTS Procedure_InsertTask;

DELIMITER $$
CREATE PROCEDURE IF NOT EXISTS Procedure_InsertTask(IN assigned_emp_id INT, IN created_by_emp_id INT, IN description VARCHAR(200), IN due_date DATETIME)
BEGIN
    INSERT INTO Tasks (AssignedEmployeeId, CreatedByEmployeeId, CreatedDate, Description, DueDate, LastUpdated, Status)
    VALUES (assigned_emp_id, created_by_emp_id, NOW(), description, due_date, NOW(), '1');
END$$
DELIMITER ;