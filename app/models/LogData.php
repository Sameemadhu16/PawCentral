<?php

// Autoload PHPMailer and other dependencies
// require __DIR__ . '/../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class LogData {
    use Database;

    protected $noti_table = 'notifications_t';
    protected $events_table = 'events';
    protected $donation_req ='donation_requests';
    protected $lostnfound = 'lost_and_found_pets';

    public function insertLog($message) {
        $query = "INSERT INTO cron_logs (message, created_at) VALUES (:message, NOW())";
        return $this->query($query, [
            'message' => $message
        ]);
    }

    public function sendNotification($to,$title,$message){
        $notificationQuery = "INSERT INTO $this->noti_table (user_id, title, message) 
                                      VALUES (:receiver_id, :title, :message)";

        $this->query($notificationQuery, [
            'receiver_id' => $to,
            'title' => $title,
            'message' => $message
        ]);
    }


    
 function closeOldLostAndFound() {
    // 1. Select old pet reports

    $query = "SELECT * FROM $this->lostnfound
                WHERE postStatus = 0 
                    AND publishedOn < (CURDATE() - INTERVAL 6 MONTH)";


    $oldReported = $this->query($query);

    if ($oldReported) {
        
        foreach ($oldReported as $report) {
            // 2. Update the event status and reason
            $updateQuery = "UPDATE $this->lostnfound SET postStatus = 1, closing_reason = :reason WHERE petid = :id AND postStatus = 0";
            $this->insertLog($report->petid . " Reported Pet post closed!");
            $this->query($updateQuery, [
                'reason' => 'Auto Close',
                'id' => $report->petid
            ]);

            // Send A notification: 
            $message = "Your Pet Report has been closed down due to being inactive for a long time.";

            if ($report->status === 'Lost') {
                $message .= " You can always report again.";
            } else {
                $message .= " You can browse our Pet Shelters for adoption opportunities.";
            }

            $this->sendNotification(
                $report->id,
                $report->petName . ' : Automatic Closedown!',
                $message
            );
        }

        // 4. Log how many events were updated
        $this->insertLog(count($oldReported) . " old pet reports closed by system.");
    } else {
        
        $this->insertLog("No old pet reports found.");
    }
}




    public function checkEvents() {
        // 1. Select expired & open events
// CHECK THE REJECT STATUS : 
        $query = "SELECT * FROM events 
                    WHERE status = 0 AND approved != 2 (
                        date < CURDATE() 
                        OR (date = CURDATE() AND time < CURTIME()) ); ";

        $expiredEvents = $this->query($query);

        if ($expiredEvents) {
            
            foreach ($expiredEvents as $event) {
                // 2. Update the event status and reason
                $updateQuery = "UPDATE events SET status = 1, closing_reason = :reason WHERE event_id = :id AND status = 0";
                $this->insertLog($event->event_id . " event was closed!");
                $this->query($updateQuery, [
                    'reason' => 'Auto Close',
                    'id' => $event->event_id
                ]);
                
                // 3. Notify the event owner
                // $notificationQuery = "INSERT INTO $this->noti_table (user_id, title, message) 
                //                       VALUES (:receiver_id, :title, :message)";
                // $this->query($notificationQuery, [
                //     'receiver_id' => $event->user_id,
                //     'title' => $event->title . ' : system close down',
                //     'message' => 'Your event has been closed down due to the expiration of the event.'
                // ]);
                $this->sendNotification($event->user_id,$event->title.' : Automatic Closedown!',"Your event has been closed down due to the expiration of the event date.");
            }

            // 4. Log how many events were updated
            $this->insertLog(count($expiredEvents) . " expired events closed by system.");
        } else {
            
            $this->insertLog("No expired events found.");
        }
    }


    public function checkExpiredDonationReq() {

        $query = "SELECT * FROM $this->donation_req 
                    WHERE status = 0 AND  approved != 2 AND
                        expire_date < CURDATE() ";

        $expiredDonReq = $this->query($query);

        if ($expiredDonReq) {
            
            foreach ($expiredDonReq as $req) {
                // 2. Update the req status and reason
                // APPROVED STTS CHANGE?
                $updateQuery = "UPDATE $this->donation_req SET status =1, closing_reason = :reason WHERE id = :id AND status = 0 AND approved != 2";
                $this->insertLog($req->id . " donation request closed!");
                $this->query($updateQuery, [
                    'reason' => 'Auto Close',
                    'id' => $req->id
                ]);

                $this->sendNotification($req->user_id,$req->title.' : Automatic Closedown!',"Your event has been closed down due to the expiration of the required date.");
            }

            // 4. Log how many events were updated
            $this->insertLog(count($expiredDonReq) . " expired events closed by system.");
        } else {
            
            $this->insertLog("No expired events found.");
        }
    }

    
    public function checkUpcommingApp(){   
        // $this->insertLog("HERE2  ");
        $query= "SELECT 
                ap.appointment_id AS app_id,
                ap.date AS date,
                ap.timeslot AS time_slot,
                vt.name AS vet_name,
                rp.name AS pet_name,
                mp.name AS medi_name,
                ap.owner_id
              FROM 
                medical_appointments ap
              JOIN 
                veterinarians vt ON vt.vet_id = ap.vet_id
              JOIN 
                registered_pets rp ON rp.pet_id = ap.pet_id
              JOIN 
                medical_providers mp ON mp.med_id = ap.med_id
              WHERE 
                ap.completion_status = 'pending' 
                AND ap.noti_sent = 0
                AND ap.date < CURDATE() + INTERVAL 1 DAY
              ORDER BY 
                ap.date ASC;";
        
        $upcoming_app = $this->query($query);
        
//         $this->insertLog("HERE2  ");

//         $this->insertLog("Result type: " . gettype($upcoming_app));

// if ($upcoming_app) {
//     $this->insertLog("IF branch entered.");
// } else {
//     $this->insertLog("ELSE branch entered.");
// }

        if (!empty($upcoming_app)) {

            
            $this->insertLog(count($upcoming_app) );
            foreach ($upcoming_app as $req) {
                // Update notification flag
                $updateQuery = "UPDATE medical_appointments SET noti_sent = 1 WHERE appointment_id = :id AND noti_sent = 0";
                $this->query($updateQuery, ['id' => $req->app_id]);
        
                // Send notification to the pet owner
                $title = $req->pet_name . " : Medical Appointment Reminder!";
                $message = "Reminder: You have a medical appointment for " . $req->pet_name .
                           " with Dr. " . $req->vet_name . 
                           " scheduled at " . $req->time_slot . " " . $req->date . ".";
                
                $getemailQuery = "SELECT email FROM users WHERE id=:user_id";
                $emailResult=$this->query($getemailQuery,['user_id'=> $req->owner_id]);
                
                if (!empty($emailResult)) {
                    $ownerEmail = $emailResult[0]->email;
                } else {
                    $ownerEmail = null; // fallback
                }
                // $this->insertLog($ownerEmail);
                $this->sendNotification($req->owner_id, $title, $message);
                $this->sendAppointmentEmail(
                    $ownerEmail,  
                    $req->vet_name,
                    $req->medi_name,
                    $req->pet_name,
                    $req->time_slot,
                    $req->date
                );
                
    
                // Log each reminder
                $this->insertLog("Reminder sent for appointment ID: " . $req->app_id);
            }
    
            $this->insertLog(count($upcoming_app) . " medical appointment notifications sent.");
        } else {
            $this->insertLog("No upcoming appointments within 24 hrs.");
        }
    }

    public function sendAppointmentEmail($toEmail, $vet_name, $med_name, $pet_name, $time, $date) {
        $mail = new PHPMailer(true);
    
        try {
            // SMTP Settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sameemadhu2003@gmail.com'; // your Gmail
            $mail->Password = 'bqbc wqrp okqx hwrn'; // Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            // Sender and recipient
            $mail->setFrom('sameemadhu2003@gmail.com', 'PawCentral Reminder');
            $mail->addAddress($toEmail); // Owner's email
    
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'PawCentral Reminder: Upcoming Appointment';
    
            $mail->Body = "
                <h3>Medical Appointment Reminder</h3>
                <p>This is a reminder for your pet <strong>$pet_name</strong>.</p>
                <p>Appointment Details:</p>
                <ul>
                    <li><strong>Veterinarian:</strong> Dr. $vet_name</li>
                    <li><strong>Medical Provider:</strong> $med_name</li>
                    <li><strong>Date:</strong> $date</li>
                    <li><strong>Time:</strong> $time</li>
                </ul>
                <p>Please be on time.</p>
                <br>
                <p>— PawCentral</p>
            ";
    
            $mail->send();
            $this->insertLog("Email sent to $toEmail for pet $pet_name.");
        } catch (Exception $e) {
            $this->insertLog("Failed to send email to $toEmail. Error: " . $mail->ErrorInfo);
        }
    }
    
    
}
