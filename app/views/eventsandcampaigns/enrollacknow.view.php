<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Confirmation</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/event-info.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <style>
        .confirmation-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .confirmation-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 20px;
        }

        .confirmation-message {
            margin: 20px 0;
            color: var(--text-color);
        }

        .confirmation-message h2 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .confirmation-message p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .event-details {
            background-color: var(--secondary-color);
            padding: 20px;
            border-radius: var(--border-radius);
            margin: 20px 0;
            text-align: left;
        }

        .event-details p {
            margin: 10px 0;
        }

        .action-buttons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .action-buttons .btn {
            padding: 12px 25px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .backbtn {
            background-color: var(--button-normal);
            color: white;
        }

        .backbtn:hover {
            background-color: var(--button-normal-hover);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        @media (max-width: 550px) {
            .confirmation-container {
                margin: 20px;
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>

    <div class="confirmation-container">
        <div class="confirmation-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <div class="confirmation-message">
            <h2>You Have Been Successfully enrolled!</h2>
            <p>Thank you for your interest in our event.</p>
            <p>We can see that you're already registered for this event. We're looking forward to seeing you there!</p>
        </div>

        <div class="event-details">
            <p><strong>Event:</strong> <?= htmlspecialchars($event->title ?? '') ?></p>
            <p><strong>Date:</strong> <?= date('D, jS F, Y', strtotime($event->date ?? '')) ?></p>
            <p><strong>Time:</strong> <?= date('g:i A', strtotime($event->time ?? '')) ?></p>
            <p><strong>Location:</strong> <?= htmlspecialchars($event->location ?? '') ?></p>
        </div>

        <div class="action-buttons">
            <a href="<?= ROOT ?>/eventsandcampaigns" class="btn backbtn">Back to Events</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="<?= ROOT ?>/userprofile/enrolled_events" class="btn btn-secondary">View My Events</a>
            <?php endif; ?>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>
</html> 