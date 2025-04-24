<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Inquiries</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/notification.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="content">
            <h2>Inquiries</h2>
            <div class="notifications-section">

                <?php if (!empty($inquiries)) : ?>
                    <?php foreach ($inquiries as $inquiry) : ?>
                        <?php if($inquiry->reply!=1): ?>
                        <div class="notification-card">
                            <h3><?= htmlspecialchars($inquiry->inquiry) ?></h3>
                            <p class="date-time">
                                Date: <?= date('Y/m/d', strtotime($inquiry->created_at)) ?><br>
                                Time: <?= date('h:i A', strtotime($inquiry->created_at)) ?>
                            </p>
                           
                            <div style="margin-top: 10px;">
                            <button type="button" class="btn-reply" onclick="toggleReplyForm(<?= $inquiry->inquire_id ?>)">
                                 <i class="fas fa-reply"></i> Reply
                            </button>

                            <form method="GET" action="<?= ROOT ?>/provider/ignore" style="display:inline;">
                                <input type="hidden" name="inquire_id" value="<?= $inquiry->inquire_id ?>">
                                <button type="submit" class="btn-ignore">
                                <i class="fas fa-times-circle"></i> Ignore</button>
                            </form>
                            </div>
                                            <!-- Hidden reply form -->
                        <form class="reply-form" id="reply-form-<?= $inquiry->inquire_id ?>" action="<?= ROOT ?>/provider/send_reply?id=<?= $inquiry->inquirer_id ?>&title=<?=$inquiry->inquiry?>&inquire_id=<?=$inquiry->inquire_id?>" method="POST" style="display: none; margin-top: 10px;">
                            <textarea name="reply" rows="3" placeholder="Write your reply..." required></textarea>
                            <br>
                            <button type="submit" class="btn-send">Send</button>
                        </form>
                        </div>
                        <?php endif;?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No inquiries found.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
    <script>
    function toggleReplyForm(id) {
        const form = document.getElementById(`reply-form-${id}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
</body>
</html>
