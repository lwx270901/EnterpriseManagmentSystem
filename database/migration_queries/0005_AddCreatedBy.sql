USE enterprise_db;

ALTER TABLE tasks
ADD COLUMN IF NOT EXISTS CreatedBy INT NOT NULL;