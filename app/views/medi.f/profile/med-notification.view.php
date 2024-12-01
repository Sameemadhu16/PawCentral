<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="page-style-notification">
<body class="body">
    <div class="main-container">
        <div class="content">
            <h2>Notifications</h2>
            <div class="notifications-section">
                <!-- Notification Card -->
                <div class="notification-card">
                    <h3>Adoption req has been accepted</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of the printing
                    </p>
                </div>

                <div class="notification-card highlighted">
                    <h3>Notification Title 2</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text 
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Notification Title 3</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of thea type specimen book.
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>