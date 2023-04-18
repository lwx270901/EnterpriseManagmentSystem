USE enterprise_db;

ALTER TABLE departmentheads
ADD UNIQUE IF NOT EXISTS DepartmentHeadId (DepartmentHeadId);

ALTER TABLE departmentheads
ADD UNIQUE IF NOT EXISTS DepartmentId (DepartmentId);