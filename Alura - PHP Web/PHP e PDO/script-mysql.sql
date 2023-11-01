CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128),
    birth_date DATE
);

CREATE TABLE IF NOT EXISTS phones (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    area_code CHAR(4),
    number VARCHAR(16),
    student_id INTEGER,
    FOREIGN KEY (student_id) REFERENCES students (ID)
);

INSERT INTO students (name, birth_date) VALUES ('Fabio', '1984-09-15');
INSERT INTO students (name, birth_date) VALUES ('Teste novo aluno', '1998-10-31');

SELECT * FROM students s;

INSERT INTO phones (area_code, number, student_id) VALUES ('48', '123456789', 1);
INSERT INTO phones (area_code, number, student_id) VALUES ('49', '2222222', 1);

SELECT * FROM  phones p;
