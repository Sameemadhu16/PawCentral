<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Campaigns</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/pagination.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
</head>
<body>
    
<?php include("../app/views/components/header.php"); ?>

    <div class="events-container">
        <div class="events-sec">
            <h1 class="heading">Events & Campaigns</h1>
            <div class="sub-header">
                <h2>To be held recently</h2>
                <button id="publishEvent" class="btn-primary">publish event</button>
            </div>
            <div id="eventList" class="event-list">
            </div>
        </div>
        <div class="pagination">
            <button id="prevPage">previous</button>
            <span id="currentPage">1</span>
            <button id="nextPage">next</button>
        </div>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
    <script src="./assets/js/events.js"></script>

</body>
</html>