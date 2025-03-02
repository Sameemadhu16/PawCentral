<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            /* gap: min(20px, 5vw); */
            padding: 10px;
            margin: 10px auto;
            overflow-y: auto;
            max-height: 350px;
            justify-content: center; 
        }

        .donation-card {
            display: flex;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #ddd;
            transition: transform 0.3s ease;
            max-width: 450px;
            max-height: 270px;
            margin: 10px;
        }

        .donation-card:hover {
            transform: translateY(-5px);
        }

        .card-image {
            flex: 1;
            min-width: 150px;
            background-size: cover;
            background-position: center;
        }

        .card-content {
            flex: 2;
            padding: 10px;
        }

        .title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
            margin-top: 7px;
        }
        .description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
            min-height: 75px;
            max-height: 75px;
            display: -webkit-box;
            -webkit-line-clamp: 10; /* Limits text to 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

 


        .progress-bar-container {
            background: #eee;
            border-radius: 20px;
            overflow: hidden;
            height: 7px;
            margin-bottom: 8px;
        }

        .progress-bar {
            height: 100%;
            /* background: linear-gradient(90deg, #4caf50, #8bc34a); */
            background: linear-gradient(90deg, #6a0dad, #8049fe);
            width: 50%; /* Adjust this dynamically based on progress */
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .amount {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            margin-top: 0;
            padding-top:0;
        }

        .collected {
            font-size: .8rem;
        }

        .don-but{
            margin: 0px 0 5px 10px !important;
        }

        
    </style>
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>

        <div class="user-accounts-section">
            <div class="header-section">
                <h2>Donation requests</h2>
                <button class="quick-action-button fixedsize">Ask for support</button>
            </div>
            <div class="cards-container">
        <div class="donation-card">
            <div class="card-image" style="background-image: url('<?=ROOT?>/assets/images/pets/merchant/sell21.webp');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to pets in need.Join us in providing meals to pets in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 13%;"></div>
                </div>
                <p class="amount">Raised: $1,200 / <span class="collected">$8,000</span></p>
                <button class="don-but" >Edit Info</a><button class="don-but" >Close Request</button>
    </div>
        </div>
        <div class="donation-card">
            <div class="card-image" style="background-image: url('<?=ROOT?>/assets/images/pets/merchant/sell21.webp');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to pets in need.Join us in providing meals to pets in need.Join us in providing meals to pets in need.Join us in providing meals to pets in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 13%;"></div>
                </div>
                <p class="amount">Raised: $1,200 /<span class="collected"> $8,000</span></p>
                <button class="don-but" >Edit Info</button><button class="don-but">Close Request</button>
            </div>
        </div>
        <div class="donation-card">
            <div class="card-image" style="background-image: url('<?=ROOT?>/assets/images/pets/merchant/sell21.webp');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to pets in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 13%;"></div>
                </div>
                <p class="amount">Raised: $1,200 /<span class="collected"> $8,000</span></p>
                <button class="don-but" >Edit Info</button><button class="don-but" >Close Request</button>
            </div>
        </div>   
        <div class="donation-card">
            <div class="card-image" style="background-image: url('<?=ROOT?>/assets/images/pets/merchant/sell21.webp');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to pets in need.Join us in providing meals to pets in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 13%;"></div>
                </div>
                <p class="amount">Raised: $1,200 /<span class="collected"> $8,000</span></p>
                <button class="don-but" >Edit Info</button><button class="don-but">Close Request</button>
            </div>
        </div>    
            </div>
        </div>
    </div>
</body>

</html>