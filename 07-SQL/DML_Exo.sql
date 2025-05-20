CREATE DATABASE IF NOT EXISTS fake_data;

ALTER DATABASE fake_data
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

DROP TABLE IF EXISTS Students;

CREATE TABLE Students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    age INT,
    grade VARCHAR(10)
);

SET SQL_SAFE_UPDATES = 0;

-- PARTIE 1
INSERT INTO Students (first_name, last_name, age, grade) 
VALUES
('Maria','Rodriguez',21,'B'),
('Ahmed','Khan',19,'A'),
('Emily','Baker',22,'C');

SELECT * FROM Students;

-- PARTIE 2
UPDATE Students
SET grade = 'A'
WHERE first_name = 'Maria';

UPDATE Students
SET age = age + 1;


SELECT * FROM Students;

-- PARTIE 3

DELETE FROM Students
WHERE first_name="Emily"
OR age <20
;

SELECT * FROM Students;

-- PARTIE 4

TRUNCATE TABLE Students;

SELECT * FROM Students;

SET SQL_SAFE_UPDATES = 1;

DROP DATABASE IF EXISTS fake_data;
