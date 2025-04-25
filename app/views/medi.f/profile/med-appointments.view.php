<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="page-style-appointments">
<body>
    <div class="container">
        <div class="header">
        <h1>Appointments Dashboard</h1>
        <p>Total Appointments Today: <?php echo $todayCount; ?> | Upcoming: <?php echo $upcomingCount; ?></p>
        </div>

        <div class="date-nav">
            <button id="prev-date">⟨</button>
            <div id="date-buttons-container">
                <!-- Date buttons will be dynamically inserted here -->
            </div>
            <button id="next-date">⟩</button>
        </div>
        <div class="card-container">
            <!-- appointment cards will appear here -->
        </div>
        <?php include("../app/views/medi.f/profile/popup/add-medicalRecord.view.php"); ?>
   </div>
</body>
</html>