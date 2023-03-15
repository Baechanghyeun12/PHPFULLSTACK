--사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.
--월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
--짝궁의 [1,2]것도 넣어주세요.
--나와 짝궁의 소속 부서를 d009로 변경해 주세요.

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,here_date
)
VALUES
(
	500000
	,DATE(19970518)
	,'창현'
	,'배'
	,'남자'
	,NOW()
);