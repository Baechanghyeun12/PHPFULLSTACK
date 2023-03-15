SELECT emp_no
FROM titles
WHERE title = 'staff';

SELECT emp_no
from dept_emp
WHERE dept_no = 'd004';

SELECT dept_no, from_date, to_date
FROM dept_emp
WHERE emp_no=10027;

SELECT emp_no
FROM salaries
WHERE salary<=60000;

SELECT emp_no
FROM salaries
WHERE salary<=60000 OR salary>=80000;

SELECT emp_no
FROM salaries
WHERE salary>=60000 and salary<=80000;

SELECT emp_no
FROM salaries
WHERE salary BETWEEN 60000 AND 80000;

SELECT emp_no
FROM dept_manager
WHERE dept_no IN('d006','d009');    

