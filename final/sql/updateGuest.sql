UPDATE final_guest
SET guest_firstname = :guest_firstname, guest_lastname = :guest_lastname, guest_email = :guest_email, guest_phone = :guest_phone, guest_zip = :guest_zip, guest_card = :guest_card
WHERE guest_id = :guest_id