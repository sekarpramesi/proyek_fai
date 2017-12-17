SELECT u.ID_USER,u.FIRST_NAME_USER,u.LAST_NAME_USER,u.PHOTO_USER,
(
	SELECT count(f1.ID_USER_PAIR)

	FROM user_relationship AS f1

	WHERE f1.ID_USER=u.id_USER

	AND EXISTS

	(

        	SELECT *

        	FROM user_relationship AS f2

        	WHERE f2.ID_USER IN

        	(

                	SELECT f3.ID_USER

                	FROM user_relationship AS f3

                	WHERE f3.ID_USER_PAIR = 1

        	)

        AND f1.ID_USER_PAIR=f2.ID_USER_PAIR

	)
)
     FROM users u
     WHERE NOT EXISTS ( SELECT ID_USER 
                      FROM user_relationship r
                     WHERE r.ID_USER=u.ID_USER
                       AND r.STATUS_RELATIONSHIP = 2
                       AND r.ID_USER_PAIR=1
                  )
                 AND NOT EXISTS ( SELECT ID_USER 
                      FROM user_relationship r2
                     WHERE r2.ID_USER_PAIR = u.ID_USER
                       AND r2.STATUS_RELATIONSHIP = 2
                       AND r2.ID_USER =1
                  )
                 AND u.ID_USER !=1

