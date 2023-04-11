USE enterprise_db;

CREATE TABLE IF NOT EXISTS Roles (
    RoleId INT AUTO_INCREMENT,
    Description VARCHAR(200),
    PRIMARY KEY (RoleId)
);

CREATE TABLE IF NOT EXISTS Departments (
    DepartmentId INT AUTO_INCREMENT,
    DepartmentName VARCHAR(50) NOT NULL,
    DepartmentDescription VARCHAR(200) NOT NULL,
    PRIMARY KEY (DepartmentId)
); 

CREATE TABLE IF NOT EXISTS Employees (
	EmployeeId INT AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(100) NOT NULL,
    DepartmentId INT NOT NULL,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    PhoneNo VARCHAR(20) NOT NULL UNIQUE,
    Level INT NOT NULL,
    RoleId INT NOT NULL,
    PRIMARY KEY (EmployeeId),
    CONSTRAINT FK_EmployeeDepartment FOREIGN KEY (DepartmentId) REFERENCES Departments(DepartmentId),
    CONSTRAINT FK_EmployeeRole FOREIGN KEY (RoleId) REFERENCES Roles(RoleId)
);

CREATE TABLE IF NOT EXISTS DepartmentHeads (
  	DepartmentId INT NOT NULL,
    DepartmentHeadId INT NOT NULL,
    CONSTRAINT FK_DepartmentHead_DepartmentId FOREIGN KEY (DepartmentId) REFERENCES Departments(DepartmentId),
    CONSTRAINT FK_DepartmentHead_DepartmentHeadId FOREIGN KEY (DepartmentHeadId) REFERENCES Employees(EmployeeId)
);
   
CREATE TABLE IF NOT EXISTS Tasks (
  	TaskId INT AUTO_INCREMENT,
    AssignedEmployeeId INT NOT NULL,
    Description VARCHAR(200),
    CreatedDate DATETIME,
    DueDate DATETIME,
    Status INT NOT NULL,
    PRIMARY KEY (TaskId),
    CONSTRAINT FK_TaskEmployeeId FOREIGN KEY (AssignedEmployeeId) REFERENCES Employees(EmployeeId)
);

CREATE TABLE IF NOT EXISTS Results (
    ResultId INT AUTO_INCREMENT,
    AssignedEmployeeId INT NOT NULL,
    TaskId INT NOT NULL,
    CreatedDate DATETIME NOT NULL,
    ResultAttachmentLink VARCHAR(500),
    PRIMARY KEY (ResultId),
    CONSTRAINT FK_ResultEmployeeId FOREIGN KEY (AssignedEmployeeId) REFERENCES Employees(EmployeeId),
    CONSTRAINT FK_ResultTaskId FOREIGN KEY (TaskId) REFERENCES Tasks(TaskId)
);
    
CREATE TABLE IF NOT EXISTS Reviews (
    ReviewId INT AUTO_INCREMENT,
    ReviewerId INT NOT NULL,
    ResultId INT NOT NULL,
    ReviewOutcome INT NOT NULL,
    ReviewComment VARCHAR(5000),
  	PRIMARY KEY (ReviewId),
    CONSTRAINT FK_ReviewReviewerId FOREIGN KEY (ReviewerId) REFERENCES Employees(EmployeeId),
    CONSTRAINT FK_ReviewTaskid FOREIGN KEY (ResultId) REFERENCES Results(ResultId)
);