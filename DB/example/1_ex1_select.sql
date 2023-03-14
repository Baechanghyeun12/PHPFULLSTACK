SELECT emp_no, AVG(salary) AS avg_s
FROM salaries
GROUP BY emp_no HAVING avg_s BETWEEN 30000 AND 50000;

SELECT *
FROM dept_manager
WHERE dept_no =all
               (
               SELECT dept_no 
					FROM dept_manager
					WHERE emp_no in(110344,111035)
                );
                
SELECT *
FROM dept_manager
WHERE emp_no =any
               (
               SELECT emp_no 
					FROM dept_manager
					WHERE dept_no ='d009'
                );
                
                
                
                
                
                
                
SELECT emp_no, first_name, last_name, gender
FROM employees
WHERE emp_no in(
				SELECT emp_no
				FROM salaries
				GROUP BY emp_no 
				having AVG(salary) >=70000
				);
              

SELECT
*,NOW()
FROM titles
WHERE emp_no =10009
AND to_date >=NOW();



SELECT emp_no, last_name
FROM employees
WHERE emp_no in
					(
					SELECT emp_no
					FROM titles
					WHERE title='senior engineer'
					AND to_date >=NOW()
					);