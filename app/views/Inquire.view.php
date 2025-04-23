<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Inquiry</title>
    <link rel="stylesheet" href="../../public/assets/css/inquire.css">
</head>
<body>
    <div class="inquiry-container">
        <h2>Send an Inquiry to the Shop</h2>
        <form method="POST" action="<?= ROOT ?>/services/inquire/submit?id=<?= $shop_id['id'] ?>">
            <textarea name="message" placeholder="Type your message here..." required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
