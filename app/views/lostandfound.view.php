<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found Pets</title>
    
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/lostandfound.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/pagination.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php");?>

    <div class="pets-container">
        <div class="lostandfound-sec">
            <h1 class="heading">Lost & Found pets</h1>
            <div class="filter-buttons">
            <div class="filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="lost">Lost</button>
                <button class="filter-btn" data-filter="found">Found</button>
            </div>
            <div class="report-lost-buttons">
                <button id="reportLost">Report Lost</button>
                <button id="reportFound">Report Found</button>
            </div>
            </div>
            <div id="petList" class="pet-list"></div>
        </div>
        <div class="pagination">
            <button id="prevPage">previous</button>
            <span id="currentPage">1</span>
            <button id="nextPage">next</button>
        </div>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
    
    <script src="<?= ROOT?>/assets/js/lostandfound.js"></script>
    
    <script>
        // Event listener for the "Report Lost" button
        document.getElementById('reportLost').addEventListener('click', function() {
            window.location.href = 'http://localhost/PawCentral/public/lostandfound/report-animal'; // Replace with the actual 'lost' form URL
        });

        // Event listener for the "Report Found" button
        document.getElementById('reportFound').addEventListener('click', function() {
            window.location.href = 'http://localhost/PawCentral/public/lostandfound/report-animal'; // This will redirect to your 'found' form
        });
    </script>

</body>
</html>