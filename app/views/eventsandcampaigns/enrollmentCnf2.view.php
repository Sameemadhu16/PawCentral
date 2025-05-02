<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Confirmation</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/event-info.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .confirmation-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .confirmation-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), #9c27b0);
        }

        .confirmation-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 20px;
            animation: bounce 1s ease infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .confirmation-message {
            margin: 20px 0;
            color: var(--text-color);
            position: relative;
        }

        .confirmation-message h2 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 2rem;
            position: relative;
            display: inline-block;
        }

        .confirmation-message h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), #9c27b0);
            border-radius: 3px;
        }

        .confirmation-message p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 10px;
            color: #555;
        }

        .event-details {
            background-color: var(--secondary-color);
            padding: 25px;
            border-radius: var(--border-radius);
            margin: 30px 0;
            text-align: left;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .event-details p {
            margin: 12px 0;
            display: flex;
            align-items: center;
        }

        .event-details strong {
            min-width: 100px;
            color: var(--primary-color);
        }

        .event-details i {
            margin-right: 10px;
            color: var(--primary-color);
            width: 20px;
            text-align: center;
        }

        .action-buttons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .action-buttons .btn {
            padding: 12px 30px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #5a1485;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .additional-info {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: var(--border-radius);
            text-align: left;
        }

        .additional-info h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .additional-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .additional-info li {
            margin: 8px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .additional-info i {
            color: var(--primary-color);
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
                justify-content: center;
            }

            .event-details p {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .event-details strong {
                min-width: auto;
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
            <h2>You're Already Enrolled!</h2>
            <p>Thank you for your interest in our event.</p>
            <p>We can see that you're already registered for this event. We're looking forward to seeing you there!</p>
        </div>

        <div class="event-details">
            <p><i class="fas fa-calendar-alt"></i><strong>Event:</strong> <?= htmlspecialchars($event->title ?? '') ?></p>
            <p><i class="fas fa-clock"></i><strong>Date:</strong> <?= date('D, jS F, Y', strtotime($event->date ?? '')) ?></p>
            <p><i class="fas fa-hourglass-half"></i><strong>Time:</strong> <?= date('g:i A', strtotime($event->time ?? '')) ?></p>
            <p><i class="fas fa-map-marker-alt"></i><strong>Location:</strong> <?= htmlspecialchars($event->location ?? '') ?></p>
        </div>

        <div class="additional-info">
            <h3>What's Next?</h3>
            <ul>
                <li><i class="fas fa-check"></i> You'll receive a reminder email before the event</li>
                <li><i class="fas fa-check"></i> Check your email for any updates or changes</li>
                <li><i class="fas fa-check"></i> Arrive 15 minutes before the event starts</li>
            </ul>
        </div>

        <div class="action-buttons">
            <a href="<?= ROOT ?>/eventsandcampaigns" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back to Events
            </a>
            <a href="<?= ROOT ?>/userprofile" class="btn btn-secondary">
                <i class="fas fa-calendar-check"></i> View My Events
            </a>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>
</html> 