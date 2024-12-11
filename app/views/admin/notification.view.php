<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Notifications</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/notification.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>
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
                <div class="notification-card">
                    <h3>Adoption Request Accepted</h3>
                    <p class="date-time">Date: 2024/07/20<br>Time: 10:20 PM</p>
                    <p class="notification-message">
                        Your adoption request for "Buddy" has been accepted. Please contact the shelter for further steps.
                    </p>
                </div>

                <div class="notification-card">
                    <h3>New Event: Pet Adoption Fair</h3>
                    <p class="date-time">Date: 2024/07/22<br>Time: 03:00 PM</p>
                    <p class="notification-message">
                        Join us for the upcoming adoption fair. Meet and adopt your future furry friend!
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Medical Checkup Reminder</h3>
                    <p class="date-time">Date: 2024/07/25<br>Time: 09:00 AM</p>
                    <p class="notification-message">
                        Reminder: Your scheduled veterinary checkup for Max is on 2024/07/25 at 9:00 AM.
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Volunteer Opportunity</h3>
                    <p class="date-time">Date: 2024/08/01<br>Time: 02:00 PM</p>
                    <p class="notification-message">
                        We are looking for volunteers for our next event. Sign up now to make a difference!
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Donation Received</h3>
                    <p class="date-time">Date: 2024/08/05<br>Time: 11:15 AM</p>
                    <p class="notification-message">
                        Thank you for your generous donation of $100. It will help us support more animals in need.
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Pet Grooming Session</h3>
                    <p class="date-time">Date: 2024/08/10<br>Time: 10:00 AM</p>
                    <p class="notification-message">
                        Book your slot for the free grooming session this weekend. Limited slots available!
                    </p>
                </div>

                <div class="notification-card">
                    <h3>New Shelter Announcement</h3>
                    <p class="date-time">Date: 2024/08/15<br>Time: 01:00 PM</p>
                    <p class="notification-message">
                        We are excited to announce the opening of our new animal shelter in Green Valley.
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Pet Adoption Request Received</h3>
                    <p class="date-time">Date: 2024/08/20<br>Time: 04:30 PM</p>
                    <p class="notification-message">
                        Your adoption request for "Luna" has been submitted successfully. We'll get back to you soon.
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Animal Rescue Update</h3>
                    <p class="date-time">Date: 2024/08/25<br>Time: 07:45 PM</p>
                    <p class="notification-message">
                        We rescued 10 animals this week and are working to find them loving homes.
                    </p>
                </div>

                <div class="notification-card">
                    <h3>Event: Pet Walkathon</h3>
                    <p class="date-time">Date: 2024/08/30<br>Time: 06:30 AM</p>
                    <p class="notification-message">
                        Join us for the annual pet walkathon. Bring your furry friends and enjoy the fun!
                    </p>
                </div>

            </div>
        </div>

    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>