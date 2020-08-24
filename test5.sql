-- 5.2
INSERT INTO branches (branch_name, branch_address)
VALUES ('Chiang Mai', NULL),
    ('Chiang Rai', NULL),
    ('Phuket', NULL);

-- 5.3
DELETE FROM positions WHERE position_name = 'sale';

-- 5.4
UPDATE branches
SET branch_name = 'Narathiwat'
WHERE branch_name = 'Patani';

-- 5.5
SELECT * FROM employees;


-- 5.6
SELECT * FROM employees
INNER JOIN branches ON employees.branch_id = branches.branch_id
WHERE branches.branch_name = 'Rayong' OR branches.branch_name = 'Bangkok';


-- 5.7
SELECT * FROM employees
INNER JOIN branches ON employees.branch_id = branches.branch_id
INNER JOIN position ON employees.position_id = positions.position_id
WHERE branches.branch_name = 'Loei' AND positions.position_name = 'programmer';

-- 5.8
SELECT * 
FROM employees
INNER JOIN branches ON employees.branch_id = branches.branch_id
INNER JOIN position ON employees.position_id = positions.position_id;