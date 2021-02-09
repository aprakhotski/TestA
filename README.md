# TestA

5. SQL queries are presented below or in 'txt' file: <br>
a) [Dump BD](test_amasty.sql)  <br>

б) Query "Name and Balance":

    SELECT fullname, COALESCE(100 - SUM(summ), 100) as balance from persons
    LEFT JOIN (
        SELECT from_person_id AS person_id, SUM(amount) as summ FROM transactions GROUP BY from_person_id
        UNION
        SELECT to_person_id AS person_id, SUM(-amount) as summ froM transactions GROUP BY to_person_id
    ) as tempT
    ON id = person_id
    GROUP BY fullname
    
в) Query "Name and The greatest number of Transactions"

    SELECT fullname, SUM(summ) as number from persons
    LEFT JOIN(
	    SELECT from_person_id AS person_id, COUNT(amount) as summ FROM transactions GROUP BY from_person_id
	    UNION ALL
	    SELECT to_person_id AS person_id, COUNT(amount) as summ froM transactions GROUP BY to_person_id
	    ) as tempT
    ON persons.id = tempT.person_id
    GROUP BY fullname  
    ORDER BY `num`  DESC
    LIMIT 1

г) Query "One City Transactions"

    SELECT * FROM transactions WHERE transaction_id IN (
    SELECT transaction_id FROM (
   	 SELECT transaction_id, name FROM transactions, (SELECT persons.id, name FROM persons, cities 
  	 WHERE persons.city_id = cities.id) as tmp1
   	 WHERE from_person_id = tmp1.id
  	 INTERSECT
    	 SELECT transaction_id, name FROM transactions, (SELECT persons.id, name FROM persons, cities 
    	 WHERE persons.city_id = cities.id) as tmp2
   	 WHERE to_person_id = tmp2.id
    	))
