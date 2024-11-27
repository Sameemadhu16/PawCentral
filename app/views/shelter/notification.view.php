<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Notifications</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/notification.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container">
        <?php include("../app/views/components/shelter/sidebar.php"); ?>
        <div class="content">
            <h2>Notifications</h2>
            <div class="notifications-section">
                <!-- Notification Card -->
                <div class="notification-card highlighted">
                    <h3>Notification Title 2</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book.
                    </p>
                </div>
                
                <div class="notification-card">
                    <h3>Adoption req has been accepted</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book.
                    </p>
                </div>


                <div class="notification-card">
                    <h3>Notification Title 3</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book.
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>