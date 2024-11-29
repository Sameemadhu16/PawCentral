<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <style>
       body{
        justify-self: center;
            justify-content: center;
            align-self: center;
            align-content: center;
       }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 10px;
            max-width: 1200px;
            margin-left: 18%;
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
            font-size: .9rem;
            color: #666;
            margin-bottom: 20px;
            min-height:70px ;
            max-height:75px ;
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

        .donate-button {
            display: inline-block;
            padding: 10px 20px;
            background: #8049fe;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background 0.3s ease;
            margin: 0px 0 5px 10px ;
            
        }

        .donate-button:hover {
            background: #6a0dad;
        }
    </style>
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Donation Requests</h1>
    <div class="cards-container">
        <!-- Card 1 -->
        <div class="donation-card">
            <div class="card-image" style="background-image: url('assets/images/pets/bambi_2.jpg');"></div>
            <div class="card-content">
                <h2 class="title">Feed the pets starving</h2>
                <p class="description">We aim to provide food to 500 puppies in rural areas where they are suffering from starvation and malnutrition. These areas include mahapathana, helakanda.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 70%;"></div>
                </div>
                <p class="amount"><span class="collected">Raised: $7,000 / </span>$10,000</p>
                <a href="#" class="donate-button">Donate Now</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="donation-card">
            <div class="card-image" style="background-image: url('assets/images/pets/found_1.png');"></div>
            <div class="card-content">
                <h2 class="title">Sterilization Camp</h2>
                <p class="description">Support sterilizing stray dogs. Event is held by the LEO club of UCSC as a student project.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 50%;"></div>
                </div>
                <p class="amount"><span class="collected">Raised: $1,000 /</span> $2,000</p>
                <a href="#" class="donate-button">Donate Now</a>
                </div>
        </div>
        </div>
        <div class="cards-container">
        <!-- Card 3 -->
        <div class="donation-card">
            <div class="card-image" style="background-image: url('assets/images/pets/merchant/sell21.webp');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to pets in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 13%;"></div>
                </div>
                <p class="amount"><span class="collected">Raised: $1,200 / </span>$8,000</p>
                <a href="#" class="donate-button">Donate Now</a>
            </div>
        </div>
        <div class="donation-card">
            <div class="card-image" style="background-image: url('assets/images/pets/bambi_1.jpg');"></div>
            <div class="card-content">
                <h2 class="title">Tiny's Leg Surgery</h2>
                <p class="description">She got her leg broken by a road accident 5 months ago, and now is in extreme agony whenever she moves.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 85%;"></div>
                </div>
                <p class="amount"><span class="collected">Raised: $2,450 / </span>$3,000</p>
                <a href="#" class="donate-button">Donate Now</a>
            </div>
        </div>
    </div>
    <div class="cards-container">
        <!-- Card 3 -->
        <div class="donation-card">
            <div class="card-image" style="background-image: url('assets/images/pets/petres1.jpg');"></div>
            <div class="card-content">
                <h2 class="title">Funds in need for Happy Paws</h2>
                <p class="description">Help raise funds to take care of the non-profit Happy Paws animal care centre.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 85%;"></div>
                </div>
                <p class="amount"><span class="collected">Raised: $8,500 / </span>$10,000</p>
                <a href="#" class="donate-button">Donate Now</a>
            </div>
        </div>
        <div class="donation-card">
            <div class="card-image" style="background-image: url('assets/images/pets/found_1.png');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to families in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 66%;"></div>
                </div>
                <p class="amount"><span class="collected">Raised: $ 500 / </span>$1,500</p>
                <a href="#" class="donate-button">Donate Now</a>
            </div>
        </div>
    </div>
  

    <?php include("../app/views/components/footer.php"); ?>
</body>
</html>
