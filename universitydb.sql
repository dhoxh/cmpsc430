-- Rebuilds universitydb from scratch (safe to re-run: it resets everything).
DROP DATABASE IF EXISTS universitydb;
CREATE DATABASE universitydb;
USE universitydb;

CREATE TABLE department (
    dept_name   VARCHAR(20)    NOT NULL,
    building    VARCHAR(15),
    budget      NUMERIC(12,2)  CHECK (budget > 0),
    PRIMARY KEY (dept_name)
);

CREATE TABLE course (
    course_id   VARCHAR(8)     NOT NULL,
    title       VARCHAR(50),
    dept_name   VARCHAR(20),
    credits     NUMERIC(2,0)   CHECK (credits > 0),
    PRIMARY KEY (course_id),
    FOREIGN KEY (dept_name) REFERENCES department (dept_name)
        ON DELETE SET NULL
);

CREATE TABLE instructor (
    ID          VARCHAR(5)     NOT NULL,
    name        VARCHAR(20)    NOT NULL,
    dept_name   VARCHAR(20),
    salary      NUMERIC(8,2)   CHECK (salary > 29000),
    PRIMARY KEY (ID),
    FOREIGN KEY (dept_name) REFERENCES department (dept_name)
        ON DELETE SET NULL
);

CREATE TABLE section (
    course_id   VARCHAR(8)     NOT NULL,
    sec_id      VARCHAR(8)     NOT NULL,
    semester    VARCHAR(6)     NOT NULL
        CHECK (semester IN ('Fall', 'Winter', 'Spring', 'Summer')),
    year        NUMERIC(4,0)   NOT NULL
        CHECK (year > 1701 AND year < 2100),
    building    VARCHAR(15),
    room_number VARCHAR(7),
    PRIMARY KEY (course_id, sec_id, semester, year),
    FOREIGN KEY (course_id) REFERENCES course (course_id)
        ON DELETE CASCADE
);

CREATE TABLE teaches (
    ID          VARCHAR(5)     NOT NULL,
    course_id   VARCHAR(8)     NOT NULL,
    sec_id      VARCHAR(8)     NOT NULL,
    semester    VARCHAR(6)     NOT NULL,
    year        NUMERIC(4,0)   NOT NULL,
    PRIMARY KEY (ID, course_id, sec_id, semester, year),
    FOREIGN KEY (course_id, sec_id, semester, year)
        REFERENCES section (course_id, sec_id, semester, year)
        ON DELETE CASCADE,
    FOREIGN KEY (ID) REFERENCES instructor (ID)
        ON DELETE CASCADE
);

CREATE TABLE student (
    StdID       VARCHAR(5)     NOT NULL,
    name        VARCHAR(20)    NOT NULL,
    dept_name   VARCHAR(20),
    tot_cred    NUMERIC(3,0)   CHECK (tot_cred >= 0),
    PRIMARY KEY (StdID),
    FOREIGN KEY (dept_name) REFERENCES department (dept_name)
        ON DELETE SET NULL
);

INSERT INTO department (dept_name, building, budget) VALUES
    ('Finance',     'Sutherland', 120000.00),
    ('Marketing',   'Woodland',    85000.00),
    ('Comp. Sci.',  'Lares',      100000.00),
    ('Mathematics', 'Sutherland',  70000.00);

INSERT INTO course (course_id, title, dept_name, credits) VALUES
    ('FIN301',   'Corporate Finance',             'Finance',     3),
    ('MKTG301',  'Principles of Marketing',       'Marketing',   3),
    ('CMPSC131', 'Programming and Computation I', 'Comp. Sci.',  3),
    ('MATH140',  'Calculus with Analytic Geom I', 'Mathematics', 4);

INSERT INTO instructor (ID, name, dept_name, salary) VALUES
    ('10101', 'Srinivasan', 'Comp. Sci.',  65000.00),
    ('12121', 'Wu',         'Finance',     90000.00),
    ('15151', 'Mozart',     'Marketing',   40000.00),
    ('22222', 'Einstein',   'Mathematics', 95000.00),
    ('32343', 'El Said',    'Marketing',   60000.00);

INSERT INTO student (StdID, name, dept_name, tot_cred) VALUES
    ('00128', 'Zhang',   'Comp. Sci.',  102),
    ('12345', 'Shankar', 'Finance',      32),
    ('19991', 'Brandt',  'Marketing',    80),
    ('23121', 'Chavez',  'Finance',     110),
    ('44553', 'Peltier', 'Mathematics',  56);

INSERT INTO section (course_id, sec_id, semester, year, building, room_number) VALUES
    ('FIN301',   '001', 'Fall',   2026, 'Sutherland', '201'),
    ('MKTG301',  '001', 'Fall',   2026, 'Woodland',   '115'),
    ('MKTG301',  '002', 'Spring', 2027, 'Woodland',   '120'),
    ('CMPSC131', '001', 'Fall',   2026, 'Lares',      '107'),
    ('MATH140',  '001', 'Spring', 2027, 'Sutherland', '314');

INSERT INTO teaches (ID, course_id, sec_id, semester, year) VALUES
    ('12121', 'FIN301',   '001', 'Fall',   2026),
    ('15151', 'MKTG301',  '001', 'Fall',   2026),
    ('32343', 'MKTG301',  '002', 'Spring', 2027),
    ('10101', 'CMPSC131', '001', 'Fall',   2026),
    ('22222', 'MATH140',  '001', 'Spring', 2027);

-- From the previous homework: Finance budget +20%
UPDATE department SET budget = budget * 1.20 WHERE dept_name = 'Finance';
