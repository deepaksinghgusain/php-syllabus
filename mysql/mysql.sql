-- database
-- creating Database
CREATE DATABASE databasename;

-- droping database
DROP DATABASE databasename;

-- using database
use Database;

-- tables

-- datatypes
CHAR(size)
VARCHAR(size)
BINARY(size)
VARBINARY(size)
TINYBLOB
TINYTEXT
TEXT(size)
BLOB(size)
MEDIUMTEXT
MEDIUMBLOB
LONGTEXT
LONGBLOB
ENUM(val1, val2, val3, ...)
SET(val1, val2, val3, ...)
BIT(size)
TINYINT(size)
BOOL
BOOLEAN
SMALLINT(size)
MEDIUMINT(size)
INT(size)
INTEGER(size)
BIGINT(size)
FLOAT(size, d)
FLOAT(p)
DOUBLE(size, d)
DOUBLE PRECISION(size, d)
DECIMAL(size, d)
DEC(size, d)
DATE	
DATETIME(fsp)
TIMESTAMP(fsp)
TIME(fsp)
YEAR

-- creating table
CREATE TABLE table_name (
    column1 datatype,
    column2 datatype,
    column3 datatype,
   ....
);

-- droping table
DROP TABLE table_name;

-- inserting data
INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);

-- inserting multiple data
INSERT INTO table_name (column_list) VALUES
    (value_list_1),
    (value_list_2),
    ...
    (value_list_n);

-- mysql warning
SHOW WARNINGS;

-- NULL and NOT_NULL
SELECT column_names FROM table_name WHERE column_name IS NULL;

CREATE TABLE Persons (
    ID int NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255) NOT NULL,
    Age int
);

-- setting default value
CREATE TABLE Persons (
    ID int NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Age int,
    City varchar(255) DEFAULT 'Sandnes'
);

-- primary key
CREATE TABLE Persons (
    ID int NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Age int,
    PRIMARY KEY (ID)
);

-- table constraint
CREATE TABLE table_name (
    column1 datatype constraint,
    column2 datatype constraint,
    column3 datatype constraint,
    ....
);

NOT NULL - Ensures that a column cannot have a NULL value
UNIQUE - Ensures that all values in a column are different
PRIMARY KEY - A combination of a NOT NULL and UNIQUE. Uniquely identifies each row in a table
FOREIGN KEY - Prevents actions that would destroy links between tables
CHECK - Ensures that the values in a column satisfies a specific condition
DEFAULT - Sets a default value for a column if no value is specified
CREATE INDEX - Used to create and retrieve data from the database very quickly

-- crud 
-- introduction to select
SELECT column1, column2, ... FROM table_name;
SELECT * FROM table_name;
SELECT DISTINCT column1, column2, ... FROM table_name;

-- introduction to where
SELECT column1, column2, ... FROM table_name WHERE condition;

-- introduction to aliases
SELECT column_name AS alias_name FROM table_name;

-- update statement
UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;

-- introduction to delete
DELETE FROM table_name WHERE condition;

-- the world of string functions
-- running sql files
source file_name

-- working with concat

-- introduction to substring
-- introduction to replace
-- introduction to reverse
-- working with char length
-- changing case with lower case and upper case

--  Refining our selections
-- using distinct
-- sorting data by order by
-- using limit
-- better search with like

-- the magic of aggregation function
-- the count
-- group by
-- Note about SQL Mode only_full_group_by
-- min and max 
-- subqueries
-- using min and max with group by
-- sum function
-- avg function

-- revisting the datatypes
-- char and varchar
-- decimal
-- float and double
-- date, time and datetime
-- curdate, curtime, now
-- formating dates
-- date math
-- timestamp

-- power of logical operators
-- not equal
-- not like
-- greater than
-- less than
-- logical and
-- logical or
-- between
-- in and not in
-- case statement

-- one to one
-- types of relations
-- one to many
-- working with foreign keys
-- cross join
-- inner join
-- left join
-- right join


-- many to many
-- many to many relations

-- database triggers
-- writing first triggers 1
-- writing last triggers 2
-- creating logger triggers
-- managing triggers and a warning

-- copy database
-- mysqldump -u root -p testdb > D:\Database_backup\testdb.sql  