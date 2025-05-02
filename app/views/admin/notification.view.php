<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Admin Dashboard - Notifications</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/notification.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>
        <div class="user-accounts-section">
            <div class="header-section">
                <h2>Notifications</h2>
                <button class="quick-action-button fixedsize" onclick="window.location.href='<?= ROOT ?>/admin/notifications/mark-read';">Mark All as Read</button>
            </div>
            <div class="notifications-section">
                <?php if (!empty($notifications)): ?>
                    <?php foreach ($notifications as $notif): ?>
                        <div class="notification-card <?= $notif->is_read ? 'seen' : '' ?>" <?= $notif->is_read ? '' : 'onclick="window.location.href=\'' . ROOT . '/admin/notifications/mark-read-notification?post_id=' . $notif->id . '\'"' ?>>
                            <h3><?= htmlspecialchars($notif->title) ?></h3>
                            <p class="date-time <?= $notif->is_read ? 'seen' : '' ?>">
                                Date: <?= date('Y/m/d', strtotime($notif->created_at)) ?><br>
                                Time: <?= date('h:i A', strtotime($notif->created_at)) ?>
                            </p>
                            <p class="notification-message <?= $notif->is_read ? 'seen' : '' ?>">
                                <?= nl2br(htmlspecialchars($notif->message)) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>You have no notifications yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>