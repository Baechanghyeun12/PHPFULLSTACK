UPDATE departments
SET dept_name = '1000'
WHERE dept_no = 'd001';

UPDATE departments
SET
WHERE dept_no = 'd001';

SELECT *
FROM departments
WHERE dept_no = 'd001';


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
	,NOW()
	,'Changhyeon'
	,'Bae'
	,'M'
	,NOW()
);

UPDATE employees
SET first_name='창현'
	,last_name ='배'
	,birth_date=DATE(19970518)
WHERE emp_no=500000;

