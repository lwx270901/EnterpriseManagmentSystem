USE enterprise_db;

INSERT INTO tasks (TaskId, AssignedEmployeeId, Description, CreatedDate, DueDate, Status, CreatedBy)
VALUES 
    (1,5, 'Complete Article 10', '2023-04-19 10:34:53.44', '2023-04-22 09:34:53.44', 2, 2),
    (2,6, 'Editing Reports', '2023-04-25 14:25:53.44', '2023-04-29 12:34:53.44', 1, 3),
    (3,10, 'Writing letters to clients', '2023-03-08 03:37:51.44', '2023-03-10 08:00:53.44', 5, 4),
    (4,8, 'Preparing a budget', '2023-02-22 18:05:53.44', '2023-08-07 00:00:53.44', 2, 2),
    (5,9, 'Design of a magazine', '2023-04-10 10:34:53.44', '2023-04-18 09:34:53.44', 4, 3),
    (6,6, 'Design of a magazine', '2023-04-10 10:34:53.44', '2023-04-18 09:34:53.44', 4, 3),
    (7,7, 'Online discussion with clients', '2023-04-19 10:34:53.44', '2023-04-22 06:34:53.44', 3, 4);