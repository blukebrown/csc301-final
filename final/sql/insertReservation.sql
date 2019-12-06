INSERT INTO final_reservation (guest_id, res_time, res_arrival, res_dept, room_id)
VALUES(:guest_id, SYSDATE(), :res_arrival, :res_dept, :room_id);