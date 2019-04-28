USE appsys;

SELECT v.registration AS Registration, concat(v.make,' ',v.model) AS 'Make and Model', -- Vehicle details
			concat(e.first_name,' ',e.last_name) AS Requester, -- Employee details
				concat(fa.first_name,' ',fa.last_name) AS 'First Approver', -- First approver details
					concat(m.first_name,' ',m.last_name) AS Manager, -- Manager details
						(select d.name
							from departments d
								where e.department_id = d.id) AS Department,
							r.purpose AS Purpose, -- Purpose
								r.start_date AS 'Start Date', r.return_date AS 'Return Date', -- Usage dates
									p.actor AS 'Pending Action' -- Pending action
FROM
	requisitions r
    
JOIN vehicles v ON r.vehicle_id = v.id
	JOIN employees  e ON r.employee_id = e.id
		JOIN employees fa ON r.officer_id = fa.id
			JOIN employees m ON r.manager_id = m.id
				JOIN pending_actions p ON r.pending_action_id = p.id
						
                        
                        
