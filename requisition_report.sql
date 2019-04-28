USE appsys;

select v.registration, concat(v.make,' ',v.model), -- Vehicle details
			concat(e.first_name,' ',e.last_name), -- Employee details
				concat(fa.first_name,' ',fa.last_name), -- First approver details
					concat(m.first_name,' ',m.last_name), -- Manager details
						(select d.name
							from departments d
								where e.department_id = d.id),
							r.purpose, -- Purpose
								r.start_date, r.return_date, -- Usage dates
									p.actor -- Pending action
from
	requisitions r
    
join vehicles v ON r.vehicle_id = v.id
		 join employees  e ON r.employee_id = e.id
			join employees fa ON r.officer_id = fa.id
				join employees m ON r.manager_id = m.id
					join pending_actions p ON r.pending_action_id = p.id
						
                        
