<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">   
    
    <style>
        .inv-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height .5s ease;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .inv-container.active {
            max-height: 1000px;
        }

        .active-btn {
            background-color: var(--button-normal-hover) !important;
        }
    </style>
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/merchant/sidebar.php"); ?>

        <div class="user-accounts-section">
            <div class="events-sec">
                <div class="header-section">
                    <h2>Events You're Enrolled In</h2>
                </div>
                <!-- <?php if (!empty($enrolled_events)): ?>
                    <pre>
                        <?php print_r($enrolled_events); ?>
                    </pre>
                <?php endif; ?> -->
                <?php if (!empty($enrolled_events)): ?>
                    <div class="event-list">
                        <?php foreach ($enrolled_events as $event): ?>
                            <div class="event-card">
                                <div class="event-card-content">
                                    <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                    <div class="event-details">
                                        <h3 class="hide_overflow"><?= htmlspecialchars($event->title) ?></h3>
                                        <p><?= htmlspecialchars($event->date) ?></p>
                                        <p><?= htmlspecialchars($event->location) ?></p>
                                        <p class="hide_overflow"><?= htmlspecialchars($event->address) ?></p>
                                        <p class="published-date">Published on: <?= htmlspecialchars($event->created_at) ?></p>
                                        <span class="participants"><?= htmlspecialchars($event->enrolled) ?> / <?= htmlspecialchars($event->max_participants) ?> participants enrolled</span>
                                    </div>
                                    <div class="event-actions">
                                        <?php if ($event->status == 0): ?>
                                            <button class="close-event fixedsize" onclick="showPopup(<?= htmlspecialchars($event->event_id) ?>, '<?= ROOT ?>/merchant/event/unenroll?id=<?= htmlspecialchars($event->event_id) ?>', 'Are you sure you want to unenroll from this event?<br><br><?= htmlspecialchars($event->title) ?>')">Unenroll</button>
                                            <button class="add-event fixedsize" onclick="window.location.href='<?=ROOT?>/eventsandcampaigns/event?id=<?=$event->event_id?>'">See Info</button>
                                        <?php else: ?>
                                            <span class="event-status">Reg. Closed</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div style="text-align: center; padding: 2rem; color: #777;">
                        You are not enrolled in any events at the moment.
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; padding: 2rem;">
                        <button class="add-event fixedsize" onclick="window.location.href='<?=ROOT?>/eventsandcampaigns'">Browse Events Section</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>
</body>

</html> 