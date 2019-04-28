USE appsys;

SELECT v.registration AS registration, concat(v.make,' ',v.model) AS make_model, -- Vehicle details
			concat(e.first_name,' ',e.last_name) AS requester, -- Employee details
				concat(fa.first_name,' ',fa.last_name) AS officer, -- First approver details
					concat(m.first_name,' ',m.last_name) AS manager, -- Manager details
						(select d.name
							from departments d
								where e.department_id = d.id) AS department,
							r.purpose AS purpose, -- Purpose
								DATE_FORMAT(r.start_date, '%d %M %Y') AS start_date, 
									DATE_FORMAT(r.return_date, '%d %M %Y') AS return_date, -- Usage dates
									p.actor AS pending_action -- Pending action
FROM
	requisitions r
    
JOIN vehicles v ON r.vehicle_id = v.id
	JOIN employees  e ON r.employee_id = e.id
		JOIN employees fa ON r.officer_id = fa.id
			JOIN employees m ON r.manager_id = m.id
				JOIN pending_actions p ON r.pending_action_id = p.id
						
                        