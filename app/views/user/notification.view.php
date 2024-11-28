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
        <?php include("../app/views/components/user/sidebar.php"); ?>
        <div class="content">
            <h2>Notifications</h2>
            <div class="notifications-section">
                <!-- Notification Card -->
                <!-- <div class="notification-card highlighted">
                    <h3>Notification Title 2</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book.
                    </p>
                </div> -->

                <!-- Notification: Adoption Request Approved -->
                <div class="notification-card">
                    <h3>Adoption Request Approved</h3>
                    <p class="date-time">Date: 2024/11/28<br>Time: 03:45 PM</p>
                    <p class="notification-message">
                        Your adoption request for Bella has been approved. Please visit the shelter to complete the process.
                    </p>
                </div>

                <!-- Notification: Adoption Request Pending -->
                <div class="notification-card">
                    <h3>Adoption Request Pending</h3>
                    <p class="date-time">Date: 2024/11/25<br>Time: 01:20 PM</p>
                    <p class="notification-message">
                        Your adoption request for Max is currently under review. We will notify you once a decision is made.
                    </p>
                </div>

                <!-- Notification: Upcoming Adoption Event -->
                <div class="notification-card">
                    <h3>Upcoming Adoption Event</h3>
                    <p class="date-time">Date: 2024/12/10<br>Time: 09:00 AM</p>
                    <p class="notification-message">
                        Join us for the annual adoption fair at City Park. Meet lovable pets waiting for a home!
                    </p>
                </div>

                <!-- Notification: Volunteer Orientation Reminder -->
                <div class="notification-card">
                    <h3>Volunteer Orientation Reminder</h3>
                    <p class="date-time">Date: 2024/12/03<br>Time: 02:30 PM</p>
                    <p class="notification-message">
                        Reminder: Volunteer orientation session tomorrow at 10:00 AM at the shelter conference room.
                    </p>
                </div>

                <!-- Notification: Pet Vaccination Reminder -->
                <div class="notification-card">
                    <h3>Pet Vaccination Reminder</h3>
                    <p class="date-time">Date: 2024/11/30<br>Time: 11:15 AM</p>
                    <p class="notification-message">
                        Fluffy's next vaccination is due on 2024/12/05. Please schedule an appointment at the shelter.
                    </p>
                </div>

                <!-- Notification: Health Checkup Update -->
                <div class="notification-card">
                    <h3>Health Checkup Update</h3>
                    <p class="date-time">Date: 2024/11/20<br>Time: 04:00 PM</p>
                    <p class="notification-message">
                        Charlie has completed a full health checkup and is ready for adoption.
                    </p>
                </div>

                <!-- Notification: New Pets Added -->
                <div class="notification-card">
                    <h3>New Pets Added</h3>
                    <p class="date-time">Date: 2024/11/28<br>Time: 10:00 AM</p>
                    <p class="notification-message">
                        We’ve added 5 new pets available for adoption. Visit our website to view their profiles.
                    </p>
                </div>

                <!-- Notification: Maintenance Alert -->
                <div class="notification-card">
                    <h3>Maintenance Alert</h3>
                    <p class="date-time">Date: 2024/11/22<br>Time: 08:00 PM</p>
                    <p class="notification-message">
                        The shelter system will undergo maintenance on 2024/11/25 from 12:00 AM to 06:00 AM.
                    </p>
                </div>

                <!-- Notification: Holiday Closure -->
                <div class="notification-card">
                    <h3>Holiday Closure</h3>
                    <p class="date-time">Date: 2024/11/18<br>Time: 01:00 PM</p>
                    <p class="notification-message">
                        The shelter will be closed for Thanksgiving on 2024/11/23. We will reopen on 2024/11/24.
                    </p>
                </div>

                <!-- Notification: Thank You for Your Donation -->
                <div class="notification-card">
                    <h3>Thank You for Your Donation!</h3>
                    <p class="date-time">Date: 2024/11/12<br>Time: 05:30 PM</p>
                    <p class="notification-message">
                        Thank you for your generous donation of $100! Your support helps us care for our animals.
                    </p>
                </div>

            </div>
        </div>

    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>