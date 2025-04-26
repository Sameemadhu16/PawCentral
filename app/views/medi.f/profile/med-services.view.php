<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en" class="page-style-services">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="content-wrapper"> 
            <div class="add-button-div">
                <button class="add-service-btn" id="add-service-btn">Add a service</button>
            </div>
            <?php include("../app/views/medi.f/profile/popup/service-add.view.php"); ?>
            <!-- responds -->
            <?php if (isset($success_message)): ?>
                <div class="success-message"><?= $success_message ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error-message"><?= $error ?></div>
            <?php endif; ?>
            <div class="service-cards">
            <?php 
                if(!empty($services)) {
                    foreach($services as $service) {
                        echo "
                        <div class='service-card card'>
                            <div class='service-title'>
                                <h3>{$service->service_name}</h3>
                                <div class='buttons-div'>
                                    <button class='delete-btn' data-id='{$service->service_id}'>Delete</button>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p>No services found.</p>";
                }
            ?>
            <?php include("../app/views/components/deleteConfirmation.php"); ?>
            </div>
        </div>
</body>
</html>