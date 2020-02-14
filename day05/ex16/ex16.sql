SELECT COUNT(*) as 'Movies' FROM member_history
WHERE (DATE(member_history.date) > 10-30-2006 AND 07-27-2007 > DATE(member_history.date))
OR (DAY(DATE(member_history.date)) = 24 AND MONTH(DATE(member_history.date)) = 12);
