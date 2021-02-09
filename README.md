# TestA

5. SQL queries are presented below or in 'txt' file: [] .
a) Dump BD: [(test_amasty.sql)]  <br>
б) Query Name and Balance:

    SELECT fullname, COALESCE((100 - SUM(amount)), 100) as balance
    FROM persons 
    LEFT JOIN transactions 
    ON id = from_person_id 
    GROUP BY fullname
    
в) Query Name, The greatest amount of Transactions

