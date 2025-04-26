<?php
// Initialize your framework
require_once 'bootstrap.php';

// Run each task
closeExpiredEvents();
closeExpiredDonationPosts();
sendMedicalAppointmentReminders();

function closeExpiredEvents() {
    // Logic to close outdated event posts
    $db = new Database();
    $currentDate = date('Y-m-d H:i:s');
    
    $query = "UPDATE events SET status = 'closed' WHERE end_date < ? AND status = 'active'";
    $db->query($query, [$currentDate]);
    
    echo "Expired events closed at " . date('Y-m-d H:i:s') . "\n";
}

function closeExpiredDonationPosts() {
    // Logic to close outdated donation posts
    $db = new Database();
    $currentDate = date('Y-m-d H:i:s');
    
    $query = "UPDATE donation_posts SET status = 'closed' WHERE end_date < ? AND status = 'active'";
    $db->query($query, [$currentDate]);
    
    echo "Expired donation posts closed at " . date('Y-m-d H:i:s') . "\n";
}

function sendMedicalAppointmentReminders() {
    // Logic to send appointment reminders
    $db = new Database();
    $currentDate = date('Y-m-d H:i:s');
    $tomorrow = date('Y-m-d H:i:s', strtotime('+24 hours'));
    
    $query = "SELECT a.id, a.appointment_date, a.appointment_time, u.email, u.phone 
              FROM appointments a 
              JOIN users u ON a.user_id = u.id 
              WHERE a.appointment_date BETWEEN ? AND ? 
              AND a.notification_sent = 0";
              
    $appointments = $db->query($query, [$currentDate, $tomorrow])->fetchAll();
    
    foreach ($appointments as $appointment) {
        // Send notification (email and/or SMS)
        sendNotification($appointment);
        
        // Mark as notified
        $updateQuery = "UPDATE appointments SET notification_sent = 1 WHERE id = ?";
        $db->query($updateQuery, [$appointment['id']]);
    }
    
    echo count($appointments) . " appointment reminders sent at " . date('Y-m-d H:i:s') . "\n";
}

function sendNotification($appointment) {
    // Email notification
    $to = $appointment['email'];
    $subject = "Reminder: Upcoming Medical Appointment";
    $message = "Hello, this is a reminder that you have a medical appointment scheduled for " . 
               $appointment['appointment_date'] . " at " . $appointment['appointment_time'] . ".";
    
    $headers = "From: noreply@yoursite.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    mail($to, $subject, $message, $headers);
    
    // SMS notification (if you have an SMS gateway)
    // sendSMS($appointment['phone'], $message);
}
?>