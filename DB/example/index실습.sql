-- 5. INDEX 확인
-- 	SHOW INDEX FROM 테이블;

SHOW INDEX FROM employees;

SELECT * FROM employees WHERE last_name = 'Swan';

-- 6. INDEX 생성
-- 	CREATE INDEX 인덱스명 ON 테이블(컬럼);
-- 	CREATE INDEX 인덱스명 ON 테이블(컬럼1,컬럼2...);

CREATE INDEX idx_employees_last_name ON employees(last_name);

-- 7. INDEX 제거
-- 	DROP INDEX 인덱스명;

DROP INDEX idx_employees_last_name ON employees;