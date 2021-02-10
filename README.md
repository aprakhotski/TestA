# TestA
Task Stroop effect: [Task2](Task2)<br>

Task ATM machine: [Task3](Task3)<br>

Task SQL: [Task5](Task5)<br>
   
   Queries are presented below or in [Task5/SQLqueries.txt](Task5/SQLqueries.txt)<br>
    a) Dump BD: [Task5/test_amasty.sql](Task5/test_amasty.sql)  <br>

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

        SELECT fullname, COUNT(from_person_id) as number FROM persons, transactions 
        WHERE from_person_id = id  OR to_person_id = id 
        GROUP BY id 
        ORDER BY COUNT(from_person_id)
        DESC LIMIT 1

    г) Query "One City Transactions"

        SELECT * FROM transactions WHERE
        (SELECT COUNT(DISTINCT city_id) FROM persons WHERE id IN (from_person_id,to_person_id) ) = 1;
