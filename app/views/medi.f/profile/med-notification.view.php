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
        <div class="user-accounts-section">
            <div class="header-section">
                <h2>Notifications</h2>
                <button class="quick-action-button fixedsize" onclick="window.location.href='<?= ROOT ?>/medical-center/dashboard/notification/mark-all-read';">Mark All as Read</button>
            </div>
            <div class="notifications-section">
                <?php if (!empty($notifications)): ?>
                    <?php foreach ($notifications as $notif): ?>
                        <div class="notification-card <?= $notif->is_read ? 'seen' : '' ?>" <?= $notif->is_read ? '' : 'onclick="window.location.href=\'' . ROOT . '/medical-center/dashboard/notification/mark-read-notification?post_id=' . $notif->id . '\'"' ?>>
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
</body>

</html>