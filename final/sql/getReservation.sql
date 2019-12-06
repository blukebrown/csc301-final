SELECT *
FROM final_reservation
INNER JOIN final_guest
ON final_reservation.guest_id = final_guest.guest_id
WHERE final_reservation.res_id = :res_id;