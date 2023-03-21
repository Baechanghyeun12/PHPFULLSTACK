CREATE TABLE student_information(
	student_no INT NOT NULL PRIMARY KEY
	,student_birth DATE NOT NULL 
	,student_name VARCHAR(20) NOT NULL
	,student_addr VARCHAR(100) NOT NULL
	,student_hp CHAR(11) NOT NULL
	,student_gender ENUM('M','F') NOT null
	,student_entry_date DATE NOT NULL
	,student_grad_date DATE NOT NULL
	,student_condition ENUM('0','1','2','3') NOT NULL
);

CREATE TABLE student_grade(
	student_no INT NOT NULL
	,subject_no INT NOT NULL
	,subject_score INT NOT NULL
	,subject_rank INT NOT NULL
	,subject_finish_date DATE NOT NULL
	,PRIMARY KEY (student_no, subject_no)
);

CREATE TABLE professor_information(
	professor_no INT NOT NULL PRIMARY KEY
	,professor_name VARCHAR(20) NOT NULL
	,professor_birth DATE NOT NULL
	,dgree_no INT NOT NULL
	,professor_email VARCHAR(30) NOT NULL
	,professor_position VARCHAR(10) NOT NULL
	,professor_office_no	INT NOT NULL
	,professor_gender	ENUM('M', 'F')	NOT NULL
	,professor_ap_date DATE	NOT NULL
);

CREATE TABLE subject_information (
	subject_no INT	NOT NULL PRIMARY KEY 
	,subject_name VARCHAR(20) NOT NULL
	,person_no INT NOT NULL
	,class_date CHAR(0) NOT NULL
	,class_room	VARCHAR(10)	NOT NULL
	,class_stime TIME	NOT NULL
	,class_ltime TIME	NOT NULL
	,compulsory_complete	VARCHAR(10)	NOT NULL
	,book_no INT NOT NULL UNIQUE
	,professor_no2 INT NOT NULL UNIQUE
);

CREATE TABLE book_information (
	book_no INT NOT NULL PRIMARY KEY
	,book_name VARCHAR(15) NOT NULL
);

