  1``````````````SELECT * FROM `definitions` WHERE other_sources LIKE '(1)'

UPDATE `definitions` SET other_sources = '' WHERE other_sources LIKE '(1)'

UPDATE `definitions` SET (source_id = '1', other_sources = '') WHERE other_sources LIKE '(1)' AND source_id LIKE ''

----

SELECT * FROM `definitions` WHERE other_sources LIKE '(4)'

UPDATE `definitions` SET other_sources = '' WHERE other_sources LIKE '(4)'

UPDATE `definitions` SET source_id = '4', other_sources = '' WHERE other_sources LIKE '(4)' AND source_id LIKE ''

----

SELECT * FROM `definitions` WHERE other_sources LIKE '(28)'

UPDATE `definitions` SET other_sources = '' WHERE other_sources LIKE '(4)'

UPDATE `definitions` SET source_id = '4', other_sources = '' WHERE other_sources LIKE '(4)' AND source_id LIKE ''

----

SELECT DISTINCT author FROM `definitions`