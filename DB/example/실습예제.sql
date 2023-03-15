--1
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES
(
	500000
	,DATE(19970518)
	,'창현'
	,'배'
	,'M'
	,NOW()
);


--2
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES
(
	500000
	,'d001'
	,DATE(19970518)
	,NOW()
);


INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES
(
	500000
	,'engineer'
	,DATE(19970518)
	,NOW()
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES
(
	500000
	,77777777
	,DATE(19970518)
	,NOW()
);


--3
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES
(
	1020304050
	,NOW()
	,'성엽'
	,'유'
	,'M'
	,NOW()
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES
(
	1020304050
	,77555
	,NOW()
	,NOW()
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES
(
	1020304050
	,'engineer'
	,DATE(20230301)
	,NOW()
);

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES
(
	1020304050
	,'d002'
	,DATE(20230301)
	,NOW()
);

--4
UPDATE dept_emp
SET dept_no='d009'
WHERE emp_no=500000 OR emp_no=1020304050;

DELETE
FROM employees
WHERE emp_no=1020304050;

DELETE
FROM salaries
WHERE emp_no=1020304050;

DELETE
FROM titles
WHERE emp_no=1020304050;

DELETE
FROM dept_emp
WHERE emp_no=1020304050;

UPDATE departments
SET dept_name = '배창현'
WHERE dept_no ='d009';

UPDATE titles
SET from_date= '19970518'
WHERE emp_no = 500000;


SELECT emp_no,first_name
FROM employees
WHERE emp_no = 
				(SELECT emp_no FROM salaries ORDER BY salary DESC LIMIT 1)
				or
				emp_no=
				(SELECT emp_no FROM salaries ORDER BY salary asc LIMIT 1);


SELECT emp_no,first_name
FROM employees
WHERE emp_no = 
				(
				SELECT emp_no
				FROM salaries
				ORDER BY salary asc LIMIT 1
				);

SELECT AVG(salary)
FROM salaries;


SELECT AVG(salary)
FROM salaries
WHERE emp_no = 499975;

SELECT emp_no, last_name
FROM employees
WHERE emp_no IN  
					(
					SELECT emp_no
					FROM salaries
					WHERE salary = (SELECT MAX(salary)FROM salaries) 
						or salary= (SELECT MIN(salary)FROM salaries)
					);