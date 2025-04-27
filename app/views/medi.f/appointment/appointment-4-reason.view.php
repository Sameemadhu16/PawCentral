<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral - Find a Pet</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/appointment-reason.style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/fonts.css">
</head>
<body>
    <?php include("../app/views/components/header.php"); ?>
    <div class="container">
        <h1>BOOK APPOINTMENT</h1>
        <h2>APPOINTMENT REASON</h2>

        <!-- show validation error -->
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error-message" style="color: red; margin-bottom: 15px;">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <form id="appointment-pet-form" method="POST" action="<?= ROOT ?>/medical-appointment-reason">

            <textarea name="appointment_reason" id="appointment_reason_id" class="font-inter"></textarea>

            <div class="buttons">
                <button type="button" class="back" onclick="history.back()">Back</button>
                <a href="" class="link-medi"><button type="submit" class="book" id="book_appointment">Book Appointment</button></a>
            </div> 
        </form>
    </div>
</body>
</html>