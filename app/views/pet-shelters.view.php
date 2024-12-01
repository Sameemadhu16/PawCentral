<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/petposts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Shelters</h1>

  <div class="containers">
      <!-- Search Container -->
      <div class="search-container shelters">
        <div class="searchbox shelters">
            <label for="">Location</label>
        <select>
            <option>Anywhere</option>
            <option>Panadura</option>
            <option>asdsdadsasdasdsadgasod</option>
        </select>
        </div>

        <div class="searchbox shelters">
            <label for="">animal</label>
        <select>
            <option>Any</option>
            <option>Dogs</option>
            <option>Cats</option>
            <option>Other</option>
        </select>
        </div>

        <button>Search</button>
    </div>
    

    <!-- Results Container (Cards) -->
    <div class="results-container">
        
        <div class="card">           
            <img src="<?= ROOT ?>/assets/images/pets/services/service_1.jpg" alt="Puppy">
            <p class="name">Happy Paws shelter</p>
            <div class="centre-info">
                <p>Kalutara</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="medicalcare/id" class="btn-appointment">See more</a>
        </div>

        <div class="card">    
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_2.png" alt="Dog">
            <p class="name">Treat - veterinary Clinic</p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a>
        </div>

        <div class="card">
            <img src="<?= ROOT ?>/assets/images/pets/services/service_2.jpg" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a>
        </div>

        <div class="card">
            <img src="<?= ROOT ?>/assets/images/pets/services/service_3.jpg" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a>
        </div>

        <div class="card">
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_1.png" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a>
        </div>

        <div class="card">
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_5.png" alt="Puppy">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a>
        </div>

        <div class="card">
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_2.png" alt="Dog">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a> 
        </div>

        <div class="card">
            <img src="<?= ROOT ?>/assets/images/pets/medical_centres/med_3.png" alt="Cat">
            <p class="name">Lorem Ipsum </p>
            <div class="centre-info">
                <p>Nalluruwa</p>
                <p class="hours">Mon-Fri: 8am - 6pm</p>
            </div>
            <a href="/book" class="btn-appointment">See more</a>
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
