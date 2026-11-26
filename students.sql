CREATE DATABASE IF NOT EXISTS school CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE school;

CREATE TABLE IF NOT EXISTS students (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(100) NOT NULL,
    age   INT NOT NULL,
    grade DECIMAL(4,2) NOT NULL
);

INSERT INTO students (name, age, grade) VALUES
('Nguyễn Văn An', 16, 8.50),
('Trần Thị Bình', 17, 9.25),
('Lê Minh Châu', 16, 7.75),
('Phạm Quốc Dũng', 17, 9.25),
('Hoàng Thu Hà', 16, 6.50);
