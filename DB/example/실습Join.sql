-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT emp.emp_no,CONCAT(emp.first_name,emp.last_name) fullname,tit.title
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
WHERE tit.to_date>=NOW();

-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT emp.emp_no, emp.gender, sal.salary,sal.to_date
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date>=NOW();

-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT concat(emp.first_name,emp.last_name) fullname,sal.salary,sal.from_date,sal.to_date
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;

-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력해 주세요.
SELECT emp.emp_no,CONCAT(emp.first_name,emp.last_name) fullname,dpart.dept_name
FROM employees emp
	INNER JOIN dept_emp demp
		ON emp.emp_no = demp.emp_no
	INNER JOIN departments dpart
		ON demp.dept_no = dpart.dept_no
	WHERE demp.to_date>=NOW()
	ORDER BY emp.emp_no;

-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해 주세요.
SELECT emp.emp_no,CONCAT(emp.first_name,emp.last_name) fullname, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date>=NOW()
ORDER BY sal.salary desc LIMIT 10;

-- 5-1 Rank
SELECT emp.emp_no,CONCAT(emp.first_name,emp.last_name) fullname, sal.salary
,RANK() over(ORDER BY sal.salary DESC) Rank_number
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date>=NOW() LIMIT 10;

-- 6. 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요.
SELECT dm1.from_date,concAT(emp.first_name,emp.last_name) fullname,dpart.dept_name
FROM employees emp
	INNER JOIN dept_manager dm1
		ON emp.emp_no = dm1.emp_no
	INNER JOIN departments dpart
		ON dm1.dept_no = dpart.dept_no
WHERE dm1.to_date >= NOW();

-- 7. 현재 직책이 "staff"인 사원의 현재 전체 평균 급여를 출력해 주세요.
SELECT AVG(sal.salary)
FROM titles tit
	INNER JOIN salaries sal
		ON tit.emp_no = sal.emp_no
WHERE tit.title = 'Staff' AND sal.to_date >= NOW();

-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT CONCAT(emp.first_name,emp.last_name) '풀네임',emp.emp_no,dm.dept_no,emp.hire_date
FROM employees emp
	INNER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no;

-- 9. 현재 각 직급별 평균월급 중 60000이상인 직급의 직급명, 평균월급(정수)를 출력해 주세요.
SELECT tit.title,truncate(AVG(sal.salary),0) AS tavg
FROM titles tit
	INNER JOIN salaries sal
		ON tit.emp_no = sal.emp_no
WHERE sal.to_date>=NOW() AND tit.to_date>=NOW()
GROUP BY tit.title HAVING tavg >=60000
ORDER BY tavg DESC;

-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT tit.title,COUNT(title),emp.gender
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
WHERE emp.gender = 'F'
GROUP BY tit.title;

-- 11. 

SELECT A.gender, COUNT(A.gender) AS cnt
FROM employees A
INNER JOIN
(
	SELECT distinct emp_no
	FROM titles
	WHERE to_date < NOW()
	AND (emp_no,to_date) in
	(
		SELECT emp_no, MAX(to_date)
		FROM titles
		GROUP BY emp_no
	)
) B
ON A.emp_no = B.emp_no
GROUP BY A.gender;





SELECT A.gender, COUNT(A.gender) AS cnt
FROM employees A
INNER JOIN
(
	SELECT emp_no
	FROM titles
	GROUP BY emp_no
	HAVING MAX(to_date) != DATE('9999-01-01')
) B
ON A.emp_no = B.emp_no
GROUP BY A.gender;