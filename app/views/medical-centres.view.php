<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="findpets.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/petposts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Medical Care</h1>

  <div class="containers">
      <!-- Search Container -->
      <div class="search-container">
        <div class="searchbox">
            <label for="">Location</label>
        <select>
            <option>location</option>
            <option>wadduwa</option>
        </select>
        </div>
        
        <div class="searchbox">
            <label for="">Date</label>
        <select>
            <option>undecided</option>
        </select>
        </div>
        <div class="searchbox">
            <label for="">Looking to</label>
            <select>
                <option>any</option>
            </select>
        </div>
        <button>Search</button>
    </div>
    

    <!-- Results Container (Cards) -->
    <div class="results-container">
        
        <div class="card">           
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_1.png" alt="Puppy">
            <p class="name">Healthy Life Clinic</p>
            <div class="centre-info">
                <span class="rating">★★★★☆</span>
                <p>Kalutara</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="medicalcare/id" class="btn-appointment">Book Now</a>
        </div>

        <div class="card">    
            <span class="corner-label sell">Sell</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_2.png" alt="Dog">
            <p class="name">Treat - veterinary Clinic</p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a>
        </div>

        <div class="card">
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_3.png" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a>
        </div>

        <div class="card">
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_4.png" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a>
        </div>

        <div class="card">
            <span class="corner-label export">Export</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_1.png" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a>
        </div>

        <div class="card">
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_5.png" alt="Puppy">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a>
        </div>

        <div class="card">
            <span class="corner-label export">Export</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_2.png" alt="Dog">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a> 
        </div>

        <div class="card">
            <span class="corner-label sell">Sell</span>
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_3.png" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <span class="rating">★★★☆☆</span>
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">Book Now</a>
        </div>

    </div>

  </div>
    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&lt;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&gt;</a>
    </div>

</body>
</html>
