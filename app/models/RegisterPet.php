<?php

class RegisterPet
{
    use Model;

    protected $table = 'registered_pets';
    protected $appointment_table = 'medical_appointments';
    protected $medicalrec_table = 'medical_records';
    protected $vet_table= 'veterinarians';

    protected $order_column = 'created_at';
 
    public function getRegPets()
    {
        $userId = $_SESSION['user_id']; // Retrieve userId from session

        // $userId =2;
    // Fetch rows from the table where status = 0 and userid matches
    $query = "SELECT * FROM `" . $this->table . "` WHERE `user_id` = :userid";

    $result = $this->query($query, [':userid' => $userId]);
        //$print=$_SESSION['user_id'];
        // echo "$print";
    return $result;
    }

    public function registerPet($data) {
        return $this->insert($data) ? true : false;
    }

    public function getPet($petid){
        // $query = "SELECT * FROM `" . $this->table . "` WHERE `pet_id` = :petid";
        $result = $this->first(['pet_id' => $petid]);
        return $result;
    }

    public function getMedicalRecords($petid, $owner_id) {
        $query = "SELECT ap.appointment_id as app_id,ap.vet_id as vet_id, ap.med_id as med_id, mr.record_added_at as app_date, ap.reason as reason, 
        mr.vet_name as vet_name, mr.diagnosis as diagnosis, mr.treatment as treatment, mr.vet_notes as vet_notes
        FROM $this->medicalrec_table mr LEFT JOIN $this->appointment_table ap ON mr.appointment_id=ap.appointment_id 
        WHERE mr.pet_id = :petid AND ap.owner_id = :owner_id AND ap.status='complete' 
        ORDER BY mr.record_added_at DESC";

        $result = $this->query($query, [':petid' => $petid,':owner_id' => $owner_id]);
        return $result;
    }

    public function getUpcommingAppointments($owner_id) {
        $query = "SELECT ap.appointment_id as app_id, ap.vet_id as vet_id, ap.med_id as med_id, ap.reason as reason, 
        p.vet_name as vet_name, p.diagnosis as diagnosis, p.vet_notes as vet_notes
        FROM $this->table p LEFT JOIN $this->appointment_table ap ON p.pet_id=ap.pet_id 
        WHERE p.owner_id = :owner_id AND ap.status='complete' 
        ORDER BY ap.date ASC";

        $query= "SELECT 
                    ap.date,
                    ap.timeslot as timeslot,
                    vt.name AS vet_name,
                    rp.name AS pet_name,
                    mp.name AS medi_name
                FROM 
                    medical_appointments ap
                JOIN 
                    veterinarians vt ON vt.vet_id = ap.vet_id
                JOIN 
                    registered_pets rp ON rp.pet_id = ap.pet_id
                JOIN 
                    medical_providers mp ON mp.med_id = ap.med_id
                WHERE 
                    ap.owner_id = :owner_id AND ap.status='pending'
                ORDER BY 
                    ap.date ASC;";

        // $query1 = "SELECT * FROM $this->appointment_table ap JOIN $this->vet_table vt ON vt.vet_id = ap.vet_id WHERE ap.owner_id = :owner_id;";

        $result = $this->query($query,['owner_id'=>$owner_id]);
        // print_r($result);
        // exit();
        // SELECT * FROM medical_appointments ap JOIN veterinarians vt ON vt.vet_id = ap.vet_id WHERE ap.owner_id = 15;
        
        return $result;
    }

}
