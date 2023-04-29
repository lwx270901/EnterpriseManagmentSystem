USE enterprise_db;

INSERT INTO Tasks (TaskId, AssignedEmployeeId, CreatedByEmployeeId, Description, CreatedDate, LastUpdated, DueDate, Status)
VALUES 
    (1, 5, 2, 'Complete Article 10', NOW(), NOW(), '2023-04-22 09:34:53.44', 1),
    (2, 6, 3, 'Editing Reports', NOW(), NOW(), '2023-04-29 12:34:53.44', 1),
    (3, 10, 4, 'Writing letters to clients', NOW(), NOW(), '2023-03-10 08:00:53.44', 1),
    (4, 8, 2, 'Preparing a budget', NOW(), NOW(), '2023-08-07 00:00:53.44', 1),
    (5, 9, 3, 'Design of a magazine', NOW(), NOW(), '2023-04-18 09:34:53.44', 1),
    (6, 6, 3, 'Design of a magazine', NOW(), NOW(), '2023-04-18 09:34:53.44', 1),
    (7, 7, 4, 'Online discussion with clients', NOW(), NOW(), '2023-04-22 06:34:53.44', 1);