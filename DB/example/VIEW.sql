-- 
-- 1. VIEW란?
--    편의성을 위해서 사용한다.
-- 	가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다.
-- 	여러테이블을 조인 할 시에 view를 생성하여, 
-- 	복잡한 SQL을 편리하게 조회 할 수 있는 장점이 있습니다.

CREATE OR REPLACE VIEW TEST_VIEW
AS
		SELECT tit.title,COUNT(tit.title),emp.gender
	FROM employees emp
		INNER JOIN titles tit
			ON emp.emp_no = tit.emp_no
	WHERE emp.gender = 'M'
	AND tit.to_date = DATE(99990101)
	GROUP BY tit.title
;

CREATE VIEW TEST_VIEW
AS
	SELECT emp.emp_no,CONCAT(emp.first_name,emp.last_name) fullname,dpart.dept_name
	FROM employees emp
		INNER JOIN dept_emp demp
			ON emp.emp_no = demp.emp_no
		INNER JOIN departments dpart
			ON demp.dept_no = dpart.dept_no
	WHERE demp.to_date>=NOW()
	ORDER BY emp.emp_no
	;

SELECT * FROM TEST_VIEW;
-- 2. VIEW 생성
-- 	CREATE [OR REPLACE] VIEW 뷰명
-- 	AS
-- 		SELECT 문
-- 	;
-- 	** [OR REPLACE] : 기존의 뷰가 있을 경우 덮어쓰기를 합니다. **
-- 
-- 3. VIEW 삭제
-- 	DROP VIEW 뷰명;
DROP VIEW test_view;