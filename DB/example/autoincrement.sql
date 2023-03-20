CREATE TABLE test_member (
	mem_no		INT(11) PRIMARY KEY
	,mem_name	VARCHAR(50)
);

ALTER TABLE test_member MODIFY mem_no INT(11) AUTO_INCREMENT;

ALTER TABLE test_member AUTO_INCREMENT=10;


INSERT INTO test_member (mem_name)
VALUES ('배창현');

INSERT INTO test_member (mem_name)
VALUES ('박상준');

DELETE FROM test_member WHERE mem_no = 2;

SELECT * FROM test_member;