USE enterprise_db;

INSERT INTO Employees (EmployeeId, Username, Password, DepartmentId, FirstName, LastName, Email, PhoneNo, RoleId, Gender) 
VALUES 
    (1, 'director', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Mr.', 'Director', 'minh@gmail.com', '123456', '1', 0),
    (2, 'dephead1', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Head of Dep.', '1', 'dep1@gmail.com', '123457', '2', 1),
    (3, 'dephead2', 'e10adc3949ba59abbe56e057f20f883e', '2', 'Head of Dep.', '2', 'dep2@gmail.com', '123458', '2', 1),
    (4, 'dephead3', 'e10adc3949ba59abbe56e057f20f883e', '3', 'Head of Dep.', '3', 'dep3@gmail.com', '123459', '2', 0),
    (5, 'employee1', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Employee', '1', 'emp1@gmail.com', '123466', '3', 1),
    (6, 'employee2', 'e10adc3949ba59abbe56e057f20f883e', '2', 'Employee', '2', 'emp2@gmail.com', '123467', '3', 0),
    (7, 'employee3', 'e10adc3949ba59abbe56e057f20f883e', '3', 'Employee', '3', 'emp3@gmail.com', '123468', '3', 0),
    (8, 'employee4', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Employee', '4', 'emp4@gmail.com', '123469', '3', 0),
    (9, 'employee5', 'e10adc3949ba59abbe56e057f20f883e', '2', 'Employee', '5', 'emp5@gmail.com', '123470', '3', 1),
    (10, 'employee6', 'e10adc3949ba59abbe56e057f20f883e', '3', 'Employee', '6', 'emp6@gmail.com', '123477', '3', 1);