SELECT title, summary FROM film
WHERE UPPER(summary) LIKE '%Vincent%'
ORDER BY id_film ASC;
